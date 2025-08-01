
<?php
session_start();

$conn = new mysqli("localhost", "root", "", "PET");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$Username = $_POST['Username'];
$Password = $_POST['Password'];

// Debug print
echo "Username: $Username<br>";
echo "Password: $Password<br>";

// Prepare query
$sql = "SELECT * FROM Login WHERE Username = ? AND Password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $Username, $Password);
$stmt->execute();
$result = $stmt->get_result();

// Check credentials
if ($result->num_rows === 1) {
    $_SESSION['Username'] = $Username;
    // ✅ Redirect to Pets.php
    header("Location: Pets.php");
    exit();
} else {
    echo "<script>alert('Invalid Username or Password'); location.href = 'lo.php';</script>";
}

$stmt->close();
$conn->close();
?>