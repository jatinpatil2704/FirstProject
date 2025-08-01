<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $result = mysqli_query($conn, "SELECT * FROM Feedback WHERE ID = $ID");
    $pet = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Message = $_POST['Message'];
    $Rating = $_POST['Rating'];

    $update = "UPDATE Feedback SET Name='$Name', Message='$Message', Rating='$Rating'  WHERE ID=$ID";
    mysqli_query($conn, $update);
    header("Location: Feedback.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Feedback</h2>
  <form method="post">
    <input type="hidden" name="ID" value="<?php echo $pet['ID']; ?>">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="Name" class="form-control" value="<?php echo $pet['Name']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Message</label>
      <input type="text" name="Message" class="form-control" value="<?php echo $pet['Message']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Rating</label>
      <input type="text" name="Rating" class="form-control" value="<?php echo $pet['Rating']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="Feedback.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>