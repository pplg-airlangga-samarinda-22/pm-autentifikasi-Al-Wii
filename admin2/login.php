<?php
    require "../koneksi.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM petugas WHERE username=? AND password=?";
        $row = $koneksi->execute_query($sql, [$username, $password])->fetch_assoc();
        if ($row) {
            session_start();
            $_SESSION['id'] = $row['id_petugas'];
            $_SESSION['level'] = $row['level'];
            header("location:index.php");
        } else {
            echo "<script>alert('Gagal Login!')</script>";
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" class="form-login" method="post">
        <p>Silahkan Login</p>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Login</button>
    </form>
</body>

</html>