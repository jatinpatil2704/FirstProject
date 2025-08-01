<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    mysqli_query($conn, "DELETE FROM Owners WHERE ID = $id");
}

header("Location: Owner.php");
exit;