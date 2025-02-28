<?php
$host = "localhost";
$username = "root";
$password = ""; // Make sure this is correct (usually empty for XAMPP)
$database = "eventplan";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
