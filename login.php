<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="text" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
</form>
</body>
</html>

<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'penjualan');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Pastikan hashing password sesuai dengan metode penyimpanan

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else if ($row['role'] == 'kasir') {
            header("Location: kasir_dashboard.php");
        }
    } else {
        echo "Username atau password salah!";
    }
}
?>