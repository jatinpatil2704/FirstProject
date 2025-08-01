<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $result = mysqli_query($conn, "SELECT * FROM Pets WHERE ID = $id");
    $pet = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['ID'];
    $name = $_POST['Name'];
    $type = $_POST['Type'];
    $breed = $_POST['Breed'];
    $age = $_POST['Age'];

    $update = "UPDATE Pets SET Name='$name', Type='$type', Breed='$breed', Age='$age' WHERE ID=$id";
    mysqli_query($conn, $update);
    header("Location: o.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Pet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Pet</h2>
  <form method="post">
    <input type="hidden" name="ID" value="<?php echo $pet['ID']; ?>">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="Name" class="form-control" value="<?php echo $pet['Name']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Type</label>
      <input type="text" name="Type" class="form-control" value="<?php echo $pet['Type']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Breed</label>
      <input type="text" name="Breed" class="form-control" value="<?php echo $pet['Breed']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Age</label>
      <input type="number" name="Age" class="form-control" value="<?php echo $pet['Age']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="o.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>