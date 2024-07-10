<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "PROJECTFINAL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $insuranceId = $_POST['insuranceId'];
    $newInsuranceType = $_POST['newInsuranceType'];
    $newInsurancePremium = $_POST['newInsurancePremium'];
    $newInsuranceRenewal = $_POST['newInsuranceRenewal'];

    $stmt = $conn->prepare("UPDATE INSURANCE SET insurance_type = ?, insurance_premium = ?, renewal_date = ? WHERE Iid = ?");
    $stmt->execute([$newInsuranceType, $newInsurancePremium, $newInsuranceRenewal, $insuranceId]);

    echo "Insurance updated successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>