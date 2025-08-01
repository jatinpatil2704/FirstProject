<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    mysqli_query($conn, "DELETE FROM Pets WHERE ID = $id");
}

header("Location: Pets.php");
exit;