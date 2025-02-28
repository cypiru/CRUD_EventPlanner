<?php
session_start(); 
require_once 'database/database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch events
$sql = "SELECT * FROM eventplan";
$result = $pdo->query($sql);
?>
<?php include 'database/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Event Planner</title>
  <link rel="icon" href="epicon.png" type="image/x-icon">
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="../statics/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('views/background.jpg'); 
      background-size: cover;     
    }
    .container {
      margin-top: 40px;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .fc-header-toolbar {
      margin-bottom: 20px;
    }
    .logout-btn {
      position: absolute;
      top: 20px;
      right: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Logout Button -->
    <a href="handlers/logout.php" class="btn btn-danger logout-btn">Logout</a>


    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card p-4">
          <h2 class="text-center fw-bold">Event Planner</h2>
          <div id="calendar" class="mt-3"></div>
          <div class="d-flex justify-content-center mt-4">
            <a href="views/add_event.php" class="btn btn-primary">+ Plan Something</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mt-4">
      <div class="col-lg-8">
        <?php $res = $pdo->query("SELECT * FROM eventplan"); ?>

        <?php if ($res->rowCount() > 0): ?>
          <?php while ($row = $res->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="card p-3 mb-3">
              <h5 class="fw-bold"> <?= $row['title']; ?> </h5>
              <p class="text-muted"> <?= $row['description']; ?> </p>
              <span class="badge bg-<?= $row['status'] == 0 ? 'warning' : 'success' ?>">
                <?= $row['status'] == 0 ? "Ongoing" : "Done"; ?>
              </span>
              <p class="text-muted small mt-2">
                Start: <?= date('Y-m-d H:i', strtotime($row['start_date'])); ?> |
                End: <?= date('Y-m-d H:i', strtotime($row['end_date'])); ?>
              </p>
              <div class="d-flex gap-2">
                <a href="views/update_event.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="handlers/delete_event_handler.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <div class="alert alert-secondary text-center">No plans today?</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var events = <?php
        $events = [];
        $res = $pdo->query("SELECT * FROM eventplan");

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
          $events[] = [
            'title' => $row['title'],
            'start' => $row['start_date'],
            'end' => $row['end_date'],
            'id' => $row['id'],
            'color' => $row['status'] == 0 ? '#ffc107' : '#28a745'
          ];
        }
        echo json_encode($events);
      ?>;
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: events,
        eventClick: function(info) {
          window.location.href = `views/update_event.php?id=${info.event.id}`;
        }
      });
      calendar.render();
    });
  </script>
</body>
</html>
