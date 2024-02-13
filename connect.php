<?php

$fullName = $_POST['fullName'] ?? '';
$email = $_POST['email'] ?? '';
$mobileNumber = $_POST['mobileNumber'] ?? '';
$emailSubject = $_POST['emailSubject'] ?? '';
$message = $_POST['message'] ?? '';

$conn = new mysqli("localhost", "root", "", "portfolio");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO `contact` (`fullName`, `email`, `mobileNumber`, `emailSubject`, `message`) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssiss", $fullName, $email, $mobileNumber, $emailSubject, $message);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    echo "Message Sent Successfully";
    $stmt->close();
    $conn->close();
}

?>

