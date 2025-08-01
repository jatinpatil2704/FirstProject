<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $conn = new mysqli("localhost", "root", "", "PET");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT password FROM Login WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($db_hashed_password);
            $stmt->fetch();

            if (password_verify($password, $db_hashed_password)) {
                $_SESSION['name'] = $username;
                $_SESSION['admin_logged_in'] = true;
                header("Location: index2.php");
                exit();
            } else {
                // Optionally redirect to login with error
                echo "❌ Invalid password.";
            }
        } else {
            echo "❌ Invalid username.";
        }

        $stmt->close();
    } else {
        echo "❌ SQL error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "⚠️ Please submit the form from the login page.";
}
?>