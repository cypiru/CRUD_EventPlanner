<?php
include "../database/database.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $status = 0;

        $stmt = $pdo->prepare("INSERT INTO eventplan (title, description, status, start_date, end_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $status, $start_date, $end_date]);

        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Operation failed";
        }
    }
} catch (\Exception $e) {
    echo "Error: " . $e;
}
?>
