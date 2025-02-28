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

$stmt = $pdo->prepare("UPDATE eventplan SET title = ?, description = ?, status = ?, start_date = ?, end_date = ? WHERE id = ?");
$stmt->bindValue(1, $title);
$stmt->bindValue(2, $description);
$stmt->bindValue(3, $status);
$stmt->bindValue(4, $start_date);
$stmt->bindValue(5, $end_date);
$stmt->bindValue(6, $id, PDO::PARAM_INT);


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
