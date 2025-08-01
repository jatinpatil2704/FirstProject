<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $result = mysqli_query($conn, "SELECT * FROM History WHERE ID = $ID");
    $pet = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $ID = $_POST['ID'];
    $Pet_ID = $_POST['Pet_ID'];
    $Treatment = $_POST['Treatment'];
    $Vaccinated = $_POST['Vaccinated'];

    $update = "UPDATE History SET Pet_ID='$Pet_ID', Treatment='$Treatment', Vaccinated='$Vaccinated'  WHERE ID=$ID";
    mysqli_query($conn, $update);
    header("Location: History.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit History</h2>
  <form method="post">
    <input type="hidden" name="ID" value="<?php echo $pet['ID']; ?>">
    <div class="mb-3">
      <label class="form-label">Pet_ID</label>
      <input type="text" name="Pet_ID" class="form-control" value="<?php echo $pet['Pet_ID']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Treatment</label>
      <input type="text" name="Treatment" class="form-control" value="<?php echo $pet['Treatment']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Vaccinated</label>
      <input type="text" name="Vaccinated" class="form-control" value="<?php echo $pet['Vaccinated']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="History.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>