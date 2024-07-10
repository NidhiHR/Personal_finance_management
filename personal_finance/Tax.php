<?php
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

// Get data from the HTML form
$taxType = $_POST['taxType'];
$taxAmount = $_POST['taxAmount'];
$taxDeadline = $_POST['taxDeadline'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO TAX (tax_type, tax_amount, tax_deadline) VALUES ('$taxType', $taxAmount, '$taxDeadline')";
if ($conn->query($sql) === TRUE) {
    echo "Tax recorded successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>