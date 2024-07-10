<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectfinal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the action is 'delete'
if ($_POST['action'] === 'delete') {
    $accId = $_POST['accId'];

    // Delete the record from the ACC table
    $sql = "DELETE FROM ACC WHERE acc_id=$accId";

    if ($conn->query($sql) === TRUE) {
        echo "Account deleted successfully";
    } else {
        echo "Error deleting account: " . $conn->error;
    }
}

$conn->close();
?>