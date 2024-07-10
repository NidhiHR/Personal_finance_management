<?php
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

// Function to sanitize input
function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Check if the Tid is set in the POST request
if (isset($_POST['transaction-id'])) {
    // Sanitize the input
    $id = sanitizeInput($_POST['transaction-id']);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM TRANSAC WHERE Tid = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Transaction with Tid $id deleted successfully.";
    } else {
        echo "Error deleting transaction: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Transaction ID not provided.";
}

// Close the connection
$conn->close();
?>