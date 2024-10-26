<?php
// Include database connection file
include 'connection.php';

// Assuming the user is logged in and you have stored their id in the session
$userid = $_SESSION['userid'];

// Fetch current month's expenses
$currentMonthSql = "SELECT type, SUM(amount) as total 
                    FROM transaction 
                    WHERE userid = ? AND cashflow = 'expense' 
                    AND MONTH(datetime) = MONTH(CURRENT_DATE()) 
                    AND YEAR(datetime) = YEAR(CURRENT_DATE()) 
                    GROUP BY type";
$stmt = $conn->prepare($currentMonthSql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$currentMonthResult = $stmt->get_result();

$expenses = [];
if ($currentMonthResult->num_rows > 0) {
    // Fetch current month's expenses
    while ($row = $currentMonthResult->fetch_assoc()) {
        $expenses[] = $row;
    }
} else {
    // If no current month expenses found, fetch the last available month's full expenses
    // First, find the last available month with expenses
    $lastMonthSql = "SELECT YEAR(datetime) as year, MONTH(datetime) as month
                     FROM transaction 
                     WHERE userid = ? AND cashflow = 'expense' 
                     GROUP BY YEAR(datetime), MONTH(datetime)
                     ORDER BY YEAR(datetime) DESC, MONTH(datetime) DESC 
                     LIMIT 1"; // Get the last available month
                     
    $stmt = $conn->prepare($lastMonthSql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $lastMonthResult = $stmt->get_result();
    
    if ($lastMonthResult->num_rows > 0) {
        $lastMonth = $lastMonthResult->fetch_assoc();
        $lastYear = $lastMonth['year'];
        $lastMonth = $lastMonth['month'];

        // Fetch expenses for the last available month
        $lastMonthExpensesSql = "SELECT type, SUM(amount) as total 
                                 FROM transaction 
                                 WHERE userid = ? AND cashflow = 'expense' 
                                 AND MONTH(datetime) = ? AND YEAR(datetime) = ? 
                                 GROUP BY type";
        $stmt = $conn->prepare($lastMonthExpensesSql);
        $stmt->bind_param("iii", $userid, $lastMonth, $lastYear);
        $stmt->execute();
        $lastMonthExpensesResult = $stmt->get_result();

        while ($row = $lastMonthExpensesResult->fetch_assoc()) {
            $expenses[] = $row;
        }
    } else {
        // If no expenses at all, set default values
        $expenses = [
            ['type' => 'food', 'total' => 1],
            ['type' => 'rent', 'total' => 1]
        ];
    }
}

$stmt->close();
$conn->close();

// Prepare data for the pie chart
$labels = [];
$data = [];
foreach ($expenses as $expense) {
    $labels[] = $expense['type'];
    $data[] = $expense['total'];
}

// If no data is available, provide default values for labels and data
if (empty($labels) || empty($data)) {
    $labels = ['food', 'rent'];
    $data = [1, 1];
}
?>
