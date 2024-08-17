<?php
session_start();
if ($_SESSION['role'] != 'kasir') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir Dashboard</title>
</head>
<body>
    <h2>Selamat datang di Kasir Dashboard, <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>