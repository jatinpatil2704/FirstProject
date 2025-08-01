<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    mysqli_query($conn, "DELETE FROM History WHERE ID = $id");
}

header("Location: History.php");
exit;