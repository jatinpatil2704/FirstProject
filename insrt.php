<!-- File: enquiry_insert.php -->
<?php
include 'connect.php';

$Date = $_POST['Date'];
$Time = $_POST['Time'];
$Doctor = $_POST['Doctor'];
$Reason = $_POST['Reason'];

// Insert into DB
$sql = "INSERT INTO `appoin` (Date,Time, Doctor, Reason)
        VALUES ('$Date', '$Time', '$Doctor', '$Reason')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Appoinment booked Successfully'); window.location.href='Appoin.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>