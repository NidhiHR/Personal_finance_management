<?php
// Check if the form is submitted
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

    // Get data from the form
    $investmentType = $_POST['investmentType'];
    $investmentAmount = $_POST['investmentAmount'];
    $investmentDate = $_POST['investmentDate'];

    // SQL query to insert data into the investment table
    $sql = "INSERT INTO INVEST (investment_type, investment_amount, investment_date) VALUES ('$investmentType', '$investmentAmount', '$investmentDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Investment recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>