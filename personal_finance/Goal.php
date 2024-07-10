<?php

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'add') {
        $goalDescription = $_POST['goalDescription'];
        $targetAmount = $_POST['targetAmount'];
        $currentAmount = $_POST['currentAmount'];

        $sql = "INSERT INTO GOAL (Gdescription, target_amount, current_amount) VALUES ('$goalDescription', $targetAmount, $currentAmount)";

        if ($conn->query($sql) === TRUE) {
            echo "Goal added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();

?>