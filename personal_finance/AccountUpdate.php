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

// Assuming the action is 'update'
if ($_POST['action'] === 'update') {
    $accId = $_POST['accId'];
    $newAccountNumber = $_POST['newAccountNumber'];
    $newAccountType = $_POST['newAccountType'];
    $newCurrentBalance = $_POST['newCurrentBalance'];

    // Update the record in the ACC table
    $sql = "UPDATE ACC SET acc_num='$newAccountNumber', acc_type='$newAccountType', cur_balance=$newCurrentBalance WHERE acc_id=$accId";

    if ($conn->query($sql) === TRUE) {
        echo "Account updated successfully";
    } else {
        echo "Error updating account: " . $conn->error;
    }
}

$conn->close();
?>