<?php
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];

    //cek nik yg terdafyar
    $sql = "SELECT * FROM petugas WHERE username=?";
    $cek = $koneksi->execute_query($sql, [$username]);

    if (mysqli_num_rows($cek) == 1) {
        echo "<script>aletrt('Username sudah digunakan!')<?script>";
    } else {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $level = $_POST['level'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO petugas SET nama_petugas=?, telp=?, username=?, password=?, level=?";
        $koneksi->execute_query($sql, [$nama_petugas, $telepon, $username, $password, $level]);
        echo "<script>alert('Data disimpan!')<?script>";
        header("location:admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi</title>
</head>

<body>
    <h1>Registrasi Pengguna Baru</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon">
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-item">
            <Label>Level Petugas</Label>
            <select name="level" class="form petugas">
                <option value="">Pilih Level Petugas</option>
                <option value="">Admin</option>
                <option value="">Petugas</option>
            </select>
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="login.php">Batal</a>
</body>

</html>