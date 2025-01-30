<?php 
    session_start();
    require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
</head>

<body>
    <h1>Nahhh... Data Pengaduan</h1>
    <a href="index.php">Kembali</a>
    <table>
        <thead>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nik Laporan</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = "SELECT * FROM pengaduan";
            $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
            ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row['tgl_pengaduan'] ?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['isi_laporan'] ?></td>
                <td><?= ($row['status']==0)?'menunggu':(($row['status']=='proses')?'diproses':'selesai') ?></td>
                <td>
                    <?php 
                    if ($row['status'] == 0) {
                    ?>
                    <a href="pengaduan-proses.php?id=<?=$row['id_pengaduan']?>">Verifikasi</a>
                    <?php 
                    } elseif ($row['status'] === 'Proses') {
                    ?>
                    <a href="pengaduan-selesai.php?id=<?=$row['id_pengaduan']?>">Tanggapi</a>
                    <?php 
                    } elseif ($row['status'] === 'Selesai') {
                    ?>
                    <a href="pengaduan-lihat.php?id=<?=$row['id_pengaduan']?>">Lihat</a>
                    <?php
                    }
                    ?>
                    <a href="pengaduan-hapus.php?id=<?=$row['id_pengaduan']?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>