<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "Karibu";

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$FIRST_NAME = $_POST['FIRST_NAME'];
$LAST_NAME = $_POST['LAST_NAME'];
$MOBILE = $_POST['MOBILE'];
$YOUR_TYPE = $_POST['YOUR_TYPE'];
$AMOUNT = $_POST['AMOUNT'];
$EMAIL = $_POST['E-MAIL'];

$stmt = $conn->prepare("INSERT INTO coffee (FIRST_NAME, LAST_NAME, MOBILE, YOUR_TYPE, AMOUNT, EMAIL) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssssds", $FIRST_NAME, $LAST_NAME, $MOBILE, $YOUR_TYPE, $AMOUNT, $EMAIL);

if ($stmt->execute()) {
    header('Location: index.html');
} else {
    echo "Execute failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
