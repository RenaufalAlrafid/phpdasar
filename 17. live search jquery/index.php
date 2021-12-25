<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
//koneksi ke database

require 'functions.php';

//pagination

$mahasiswa = querry("SELECT * FROM absenmahasiswa  ");


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
    <style>
        .loader{
            width: 100px;
            position: absolute;
            top: 100px;
            left: 190px;
            z-index: -1;
            display: none;
        }
    </style>
    <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <a href="logout.php">logout</a>
    <h1>Daftar Hadir Mahasiswa</h1>

    <a href="tambah.php"> Tambah Data Mahasiswa</a>
    <br><br>
    <form action="" method="post">

        <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombolCari"> Cari</button>

        <img src="img/loader.gif" alt="" class="loader">
    </form>


    <br>
    <div id="container">
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
    </div>

    <script src="js/script.js"></script>
</body>

</html>