<?php
header('Content-Type: application/json');
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit;
}

$name    = trim(htmlspecialchars($_POST['name'] ?? ''));
$email   = trim(htmlspecialchars($_POST['email'] ?? ''));
$message = trim(htmlspecialchars($_POST['message'] ?? ''));

if (!$name || !$email || !$message) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->execute([$name, $email, $message]);

echo json_encode(['success' => true, 'message' => 'Message sent successfully!']);
?>
