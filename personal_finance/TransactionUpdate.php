<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PROJECTFINAL";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 3307);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to sanitize input to prevent SQL injection
    function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags($input));
    }

    // Get data from the form
    $id = sanitizeInput($_POST['transaction-id']);
    $description = sanitizeInput($_POST['description']);
    $amount = sanitizeInput($_POST['amount']);
    $transactionType = sanitizeInput($_POST['transaction-type']);
    $transactionDate = sanitizeInput($_POST['transaction-date']);

    // SQL query to update data in the TRANSAC table based on Tid
    $sql = "UPDATE TRANSAC SET Tdescription='$description', amount=$amount, transaction_type='$transactionType', transaction_date='$transactionDate' WHERE Tid=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction updated successfully";
    } else {
        // Handle errors more effectively
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>