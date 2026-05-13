<?php
$host = 'localhost';
$db   = 'contact_db';   // change this if needed
$user = 'root';          // XAMPP default
$pass = '';              // XAMPP default (empty)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'DB connection failed.']);
    exit;
}
?>
