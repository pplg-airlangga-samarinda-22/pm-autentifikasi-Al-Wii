<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nik = $_POST['nik'];
    $sql = "SELECT * FROM masyarakat WHERE nik=?";
    $cek = $koneksi->execute_query($sql, [$nik]);
    if ($cek->num_rows == 1) {
        echo "<script>alert('NIK sudah digunakan!')</script>";
    } else {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO masyarakat (nik, nama, telp, username, password) values (?, ?, ?, ?, ?)";
        $row = $koneksi->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);
        echo "<script>alert('Pendaftaran berhasil!')</script>";
        header("location:masyarakat.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Masyarakat</title>
</head>

<body>
    <h1>Tambah Data Masyarakat</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik">
        </div>
        <div class="form-item">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="form-item">
            <label for="telp">Telepon</label>
            <input type="telp" name="telp" id="telp">
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Register</button>
        <a href="masyarakat.php">Batal</a>
    </form>
</body>

</html>