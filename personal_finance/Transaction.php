<?php
// Check if the form is submitted for adding a transaction
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "PROJECTFINAL";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 3307);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to sanitize user input
    function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags($input));
    }

    // Get data from the form
    $description = sanitizeInput($_POST['description']);
    $amount = sanitizeInput($_POST['amount']);
    $transactionType = sanitizeInput($_POST['transaction-type']);
    $transactionDate = sanitizeInput($_POST['transaction-date']);

    // SQL query to insert data into the TRANSAC table
    $sql = "INSERT INTO TRANSAC (Tdescription, amount, transaction_type, transaction_date) VALUES ('$description', '$amount', '$transactionType', '$transactionDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>