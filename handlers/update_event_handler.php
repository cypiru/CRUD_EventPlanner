<?php
include "../database/database.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $stmt = $conn->prepare("UPDATE eventplan SET title = ?, description = ?, status = ?, start_date = ?, end_date = ? WHERE id = ?");
        $stmt->bind_param("ssissi", $title, $description, $status, $start_date, $end_date, $id);

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