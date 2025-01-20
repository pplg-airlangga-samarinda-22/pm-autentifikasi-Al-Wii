<?php
    session_start();
    require "../koneksi.php";
    if (empty($_SESSION['level'])) {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pengaduan</title>
</head>

<body>
    <h1>Selamat Datang di Sistem Pengaduan Masyarakat</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="pengaduan.php">Pengaduan</a>
        <a href="masyarakat.php">Masyarakat</a>
        <a href="petugas.php">Petugas</a>
        <a href="laporan.php">Laporan</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>

</html>