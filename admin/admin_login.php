<?php
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $_SESSION['username'] = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM petugas WHERE username =? AND password=?";
    $row = $koneksi->execute_query($sql, [$username, $password]);

    if (mysqli_num_rows($row) == 1) {
        session_start();
        $_SESSION['username'] = $username;
        header("location:admin.php");
    } else {
        echo "<script>alert('Gagal Login')</script>";
    }
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <form action="" method="post" class="form-login">
        <h2>Silahkan Login</h2>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>

</html>