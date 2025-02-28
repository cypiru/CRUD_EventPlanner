<?php
session_start();
include '../database/database.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($email) && !empty($password)) {
        try {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Prepare and execute SQL statement
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashed_password]);

            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: ../views/login.php");
            exit();
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header("Location: ../views/register.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "All fields are required!";
        header("Location: ../views/register.php");
        exit();
    }
}
?>
