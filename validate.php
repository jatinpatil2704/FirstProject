<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Username'], $_POST['Password'])) {
    $conn = new mysqli("localhost", "root", "", "PET");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Username = trim($_POST['Username']);
    $Password = $_POST['Password'];

    $sql = "SELECT Password FROM Login WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($db_Password);
        $stmt->fetch();

        if (password_verify($Password, $db_Password)) {
            $_SESSION['name'] = $Username;
            $_SESSION['admin_logged_in'] = true;
            header("Location: general.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please submit the form using the login page.";
}
?>