<?php 
    session_start();
    require "../koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $nik = $_GET['nik'];

        $sql = "DELETE FROM masyarakat WHERE nik=?";
        $row = $koneksi->execute_query($sql, [$nik]);
        if ($row) {
            header("location:masyarakat.php");
        }
    }
?>