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


// Function to sanitize input
function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Check if the form data is set
if (
    isset($_POST['accountNumber']) &&
    isset($_POST['accountType']) &&
    isset($_POST['currentBalance'])
) {
    // Sanitize input
    $accountNumber = sanitizeInput($_POST['accountNumber']);
    $accountType = sanitizeInput($_POST['accountType']);
    $currentBalance = sanitizeInput($_POST['currentBalance']);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO ACC (acc_num, acc_type, cur_balance) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $accountNumber, $accountType, $currentBalance);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Account added successfully.";
    } else {
        echo "Error adding account: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid data submitted.";
}

// Close the connection
$conn->close();
?>