<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "PROJECTFINAL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $insuranceType = $_POST['insuranceType'];
    $insurancePremium = $_POST['insurancePremium'];
    $insuranceRenewal = $_POST['insuranceRenewal'];

    $stmt = $conn->prepare("INSERT INTO INSURANCE (insurance_type, insurance_premium, renewal_date) VALUES (?, ?, ?)");
    $stmt->execute([$insuranceType, $insurancePremium, $insuranceRenewal]);

    echo "Insurance recorded successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>