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

    if ($action == 'update') {
        $gid = $_POST['gid'];
        $newGoalDescription = $_POST['newGoalDescription'];
        $newTargetAmount = $_POST['newTargetAmount'];
        $newCurrentAmount = $_POST['newCurrentAmount'];

        $sql = "UPDATE GOAL SET Gdescription='$newGoalDescription', target_amount=$newTargetAmount, current_amount=$newCurrentAmount WHERE Gid=$gid";

        if ($conn->query($sql) === TRUE) {
            echo "Goal updated successfully";
        } else {
            echo "Error updating goal: " . $conn->error;
        }
    }
}

$conn->close();

?>