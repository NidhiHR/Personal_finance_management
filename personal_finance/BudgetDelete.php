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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    if ($action === "delete") {
        $bid = $_POST["bid"];

        // Prepare and bind the DELETE statement
        $stmt = $conn->prepare("DELETE FROM BUDGET WHERE Bid = ?");
        $stmt->bind_param("i", $bid);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Budget record deleted successfully";
        } else {
            echo "Error deleting budget record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>