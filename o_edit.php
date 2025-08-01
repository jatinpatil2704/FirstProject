<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $result = mysqli_query($conn, "SELECT * FROM Owners WHERE ID = $id");
    $pet = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['ID'];
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];

    $update = "UPDATE Owners SET Name='$Name', Phone='$Phone', Email='$Email', Address='$Address' WHERE ID=$id";
    mysqli_query($conn, $update);
    header("Location: Owner.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Detail</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit Detail</h2>
  <form method="post">
    <input type="hidden" name="ID" value="<?php echo $pet['ID']; ?>">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="Name" class="form-control" value="<?php echo $pet['Name']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input type="text" name="Phone" class="form-control" value="<?php echo $pet['Phone']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="text" name="Email" class="form-control" value="<?php echo $pet['Email']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" name="Address" class="form-control" value="<?php echo $pet['Address']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="Owner.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>