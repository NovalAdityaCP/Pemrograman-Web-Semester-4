<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../../config/database.php';
$conn = connectDB();

// Ambil data user
$sql = $conn->prepare("SELECT * FROM user WHERE id = :id");
$sql->bindParam(':id', $_SESSION['user_id']);
$sql->execute();
$user = $sql->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['username']) ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>