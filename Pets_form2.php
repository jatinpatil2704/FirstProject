<?php
require('connect.php');

$update = false;
$Pet_ID = '';
$Name = '';
$Type = '';
$Breed = '';
$Age = '';

if (isset($_GET['ID'])) {
    $update = true;
    $Pet_ID = $_GET['ID'];

    $result = mysqli_query($conn, "SELECT * FROM Pets WHERE ID=$Pet_ID");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $Name = $row['Name'];
        $Type = $row['Type'];
        $Breed = $row['Breed'];
        $Age = $row['Age'];
    }
}
?>


<form action="Pets_form.php" method="POST">
  <input type="hidden" name="ID" value="<?php echo $pet_id; ?>">

  <label>Name:</label>
  <input type="text" name="Name" value="<?php echo $name; ?>" required><br>

  <label>Type:</label>
  <input type="text" name="Type" value="<?php echo $type; ?>" required><br>

  <label>Breed:</label>
  <input type="text" name="Breed" value="<?php echo $breed; ?>" required><br>

  <label>Age:</label>
  <input type="number" name="Age" value="<?php echo $age; ?>" required><br>

  <?php if ($update): ?>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
  <?php else: ?>
    <button type="submit" name="save" class="btn btn-success">Save</button>
  <?php endif; ?>
</form>




<?php
if (isset($_POST['save'])) {
    $Name = $_POST['Name'];
    $Type = $_POST['Type'];
    $Breed = $_POST['Breed'];
    $Age = $_POST['Age'];

    $query = "INSERT INTO Pets (Name, Type, Breed, Age) VALUES ('$Name', '$Type', '$Breed', '$Age')";
    mysqli_query($conn, $query);
    header("Location: your_page_name.php"); // redirect to list
}

if (isset($_POST['update'])) {
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Type = $_POST['Type'];
    $Breed = $_POST['Breed'];
    $Age = $_POST['Age'];

    $query = "UPDATE Pets SET Name='$Name', Type='$Type', Breed='$Breed', Age='$Age' WHERE ID=$ID";
    mysqli_query($conn, $query);
    header("Location: your_page_name.php"); // redirect to list
}
?>