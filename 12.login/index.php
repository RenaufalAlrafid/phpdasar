<?php


//koneksi ke database

require 'functions.php';

$mahasiswa = querry("SELECT * FROM absenmahasiswa ");


// jika tombol cari di klik
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Hadir Mahasiswa</h1>

    <a href="tambah.php"> Tambah Data Mahasiswa</a>
    <br><br>
    <form action="" method="post">
        
        <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari"> Cari</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Identitas</th>
            <th>Kelas</th>
            <th>Kehadiran</th>
            <th>Apresiasi</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>"> ubah </a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')"> hapus </a>
                </td>
                <td><?= $row["NIM"] ?></td>
                <td><?= $row["Nama"] ?></td>
                <td><?= $row["Identitas"] ?></td>
                <td><?= $row["Kelas"] ?></td>
                <td><?= $row["Kehadiran"] ?></td>
                <td>
                    <?php if ($row["Kehadiran"] == 'Hadir') { ?>
                        <img src=" img/jempol1.jpg" alt="good">
                    <?php } else { ?>
                        <img src="img/jempol2.jpg" alt=" not good">
                    <?php } ?>
                </td>
            </tr>
            <?php $i++ ?>

        <?php endforeach; ?>
    </table>
</body>

</html>