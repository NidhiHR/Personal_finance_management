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

    if ($action == 'delete') {
        $gid = $_POST['gid'];

        $sql = "DELETE FROM GOAL WHERE Gid=$gid";

        if ($conn->query($sql) === TRUE) {
            echo "Goal deleted successfully";
        } else {
            echo "Error deleting goal: " . $conn->error;
        }
    }
}

$conn->close();

?>