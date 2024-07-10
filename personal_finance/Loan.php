<?php
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

    // Get loan details from the POST request
    $loanAmount = $_POST['loanAmount'];
    $interestRate = $_POST['interestRate'];
    $loanTerm = $_POST['loanTerm'];

    // SQL query to insert loan details into the database
    $sql = "INSERT INTO LOAN (loan_amount, interest_rate, loan_term) VALUES ('$loanAmount', '$interestRate', '$loanTerm')";

    if ($conn->query($sql) === TRUE) {
        echo "Loan details recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>