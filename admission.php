<?php
include 'connect.php';

$sql = "SELECT * FROM appoin";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Appoinments</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Appoinments Records</h2>
    <table id="enquiryTable" class="table table-bordered table-striped">
      <thead class="table-primary text-center">
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Doctor</th>
          <th>Reason</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['Date']; ?></td>
            <td><?php echo $row['Time']; ?></td>
            <td><?php echo $row['Doctor']; ?></td>
            <td><?php echo $row['Reasone']; ?></td>
            <td><?php echo $row['Action']; ?></td>

            <td>
              <a href="#" class="btn btn-primary btn-sm">Edit</a>
              <a href="#" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#appoinTable').DataTable();
    });
  </script>
</body>
</html>