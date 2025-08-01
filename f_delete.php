<?php
include('connect.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    mysqli_query($conn, "DELETE FROM Feedback WHERE ID = $id");
}

header("Location: Feedback.php");
exit;