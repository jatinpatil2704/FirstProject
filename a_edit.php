<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $result = mysqli_query($conn, "SELECT * FROM appoin WHERE ID = $id");
    $pet = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['ID'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];
    $Doctor = $_POST['Docto'];
    $Reason = $_POST['Reason'];

    $update = "UPDATE appoin SET Date='$Date', Time='$Time', Doctor='$Doctor', Reason='$Reason' WHERE ID=$id";
    mysqli_query($conn, $update);
    header("Location: Appoinment.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Appoinment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Appoinment</h2>
  <form method="post">
    <input type="hidden" name="ID" value="<?php echo $pet['ID']; ?>">
    
    <div class="mb-3">
      <label class="form-label">Date</label>
      <input type="Date" name="Date" class="form-control" value="<?php echo $pet['Date']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Time</label>
      <input type="Time" name="Time" class="form-control" value="<?php echo $pet['Time']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Doctor</label>
      <input type="text" name="Doctor" class="form-control" value="<?php echo $pet['Doctor']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Reason</label>
      <input type="text" name="Reason" class="form-control" value="<?php echo $pet['Reason']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="Appoinment.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>