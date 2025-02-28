<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Create Plans</title>
  <link rel="icon" href="../epicon.png" type="image/x-icon">
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="../statics/js/bootstrap.bundle.min.js"></script>
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
    .form-container textarea {
      border-radius: 5px;
      border: 1px solid #ced4da;
      padding: 0.75rem;
      margin-bottom: 1rem;
    }
    .form-container input:focus,
    .form-container textarea:focus {
      border-color: #80bdff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .form-container .btn-planned {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 5px;
      font-weight: 500;
    }
    .form-container .btn-planned:hover {
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
          <h3 class="text-center">Create Plans</h3>
          <form action="../handlers/add_event_handler.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" placeholder="Enter plan title" required />
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Enter plan description"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Start Date</label>
              <input type="datetime-local" class="form-control" name="start_date" required />
            </div>
            <div class="mb-3">
              <label class="form-label">End Date</label>
              <input type="datetime-local" class="form-control" name="end_date" required />
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="../index.php" class="btn btn-cancel">Cancel</a>
              <button type="submit" class="btn btn-planned">Planned</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
