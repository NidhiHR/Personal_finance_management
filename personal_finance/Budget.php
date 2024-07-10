<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'add') {
        addBudget();
    }
}

function addBudget()
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
        $budgetAmount = $_POST['budgetAmount'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO BUDGET (budget_amount, start_date, end_date) VALUES (:budgetAmount, :startDate, :endDate)");
        $stmt->bindParam(':budgetAmount', $budgetAmount);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);

        $stmt->execute();

        echo "Budget added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>