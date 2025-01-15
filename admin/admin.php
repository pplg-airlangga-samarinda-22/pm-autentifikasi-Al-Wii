<?php
session_start();
if (empty($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Selamat Datang di Aplikasi Pengaduan Masyarakat</h1>
    <nav>
        <a href="admin.php">Dashboard</a>
        <a href="admin_logout.php">Logout</a>
    </nav>
</body>

</html>