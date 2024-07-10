<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "PROJECTFINAL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $insuranceId = $_POST['insuranceId'];

    $stmt = $conn->prepare("DELETE FROM INSURANCE WHERE Iid = ?");
    $stmt->execute([$insuranceId]);

    echo "Insurance deleted successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>