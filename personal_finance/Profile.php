<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "PROJECTFINAL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve data from the form
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $useraddress = $_POST['useraddress'];
    $pincode = $_POST['pincode'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    // Check if the user already exists in the database
    $stmt = $conn->prepare("SELECT * FROM username WHERE userid = ?");
    $stmt->execute([$userid]);
    $userExists = $stmt->fetch();

    if ($userExists) {
        // If the user exists, update the existing record
        $stmt = $conn->prepare("UPDATE username SET username=?, dob=?, useradress=?, pincode=?, phone=?, gender=?, age=? WHERE userid=?");
        $stmt->execute([$username, $dob, $useraddress, $pincode, $phone, $gender, $age, $userid]);
        echo "Profile updated successfully";
    } else {
        // If the user doesn't exist, insert a new record
        $stmt = $conn->prepare("INSERT INTO username (username, dob, useradress, pincode, phone, gender, age) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$username, $dob, $useraddress, $pincode, $phone, $gender, $age]);
        echo "Profile saved successfully";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>