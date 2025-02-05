<?php
include '../database/database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid request: ID is missing");
}

$stmt = $conn->prepare("SELECT * FROM eventplan WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $todo = $result->fetch_assoc();
} else {
    die("Event not found");
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Planner</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: url('background.jpg'); 
      background-size: cover;    
    }
    .form-container {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      margin-top: 2rem;
    }
    .form-container h3 {
      color: #343a40;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }
    .form-container label {
      font-weight: 500;
      color: #495057;
    }
    .form-container input,
    .form-container textarea,
    .form-container select {
      border-radius: 5px;
      border: 1px solid #ced4da;
      padding: 0.75rem;
      margin-bottom: 1rem;
    }
    .form-container input:focus,
    .form-container textarea:focus,
    .form-container select:focus {
      border-color: #80bdff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .form-container .btn-save {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 5px;
      font-weight: 500;
    }
    .form-container .btn-save:hover {
      background-color: #0056b3;
    }
    .form-container .btn-cancel {
      background-color: #6c757d;
      color: #fff;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 5px;
      font-weight: 500;
    }
    .form-container .btn-cancel:hover {
      background-color: #5a6268;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="form-container">
          <h3 class="text-center">Edit Planner</h3>
          <form action="../handlers/update_event_handler.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($todo['id']) ?>" />
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($todo['title']) ?>" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control" name="description" rows="3" required><?= htmlspecialchars($todo['description']) ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select class="form-control" name="status" required>
                <option value="0" <?= $todo['status'] == 0 ? 'selected' : '' ?>>Ongoing</option>
                <option value="1" <?= $todo['status'] == 1 ? 'selected' : '' ?>>Done</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Start Date</label>
              <input type="datetime-local" class="form-control" name="start_date" value="<?= date('Y-m-d\TH:i', strtotime($todo['start_date'])) ?>" required />
            </div>
            <div class="mb-3">
              <label class="form-label">End Date</label>
              <input type="datetime-local" class="form-control" name="end_date" value="<?= date('Y-m-d\TH:i', strtotime($todo['end_date'])) ?>" required />
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="../index.php" class="btn btn-cancel">Cancel</a>
              <button type="submit" class="btn btn-save">Save Planned</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
