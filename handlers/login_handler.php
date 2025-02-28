<?php
session_start();
include '../database/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['user_id'] = $user['id']; // Add this line to set the user_id
            header("Location: ../index.php"); // Redirect to dashboard

            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password!";
            header("Location: ../views/login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "All fields are required!";
        header("Location: ../views/login.php");
        exit();
    }
}
?>
