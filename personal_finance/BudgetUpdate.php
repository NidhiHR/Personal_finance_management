<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'update') {
        updateBudget();
    }
}

function updateBudget()
{
    // Add your database connection code here
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "PROJECTFINAL";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get data from POST request
        $bid = $_POST['bid'];
        $newBudgetAmount = $_POST['newBudgetAmount'];
        $newStartDate = $_POST['newStartDate'];
        $newEndDate = $_POST['newEndDate'];

        // Update data in the database
        $stmt = $conn->prepare("UPDATE BUDGET SET budget_amount = :newBudgetAmount, start_date = :newStartDate, end_date = :newEndDate WHERE Bid = :bid");
        $stmt->bindParam(':newBudgetAmount', $newBudgetAmount);
        $stmt->bindParam(':newStartDate', $newStartDate);
        $stmt->bindParam(':newEndDate', $newEndDate);
        $stmt->bindParam(':bid', $bid);

        $stmt->execute();

        echo "Budget updated successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>