<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Selamat datang di Admin Dashboard, <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>