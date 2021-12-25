<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
//koneksi ke database

require 'functions.php';

//PAGINATION
//konfigurasi
$jumlahDataPerHalaman = 10;

// $result = mysqli_query($conn, "SELECT * FROM absenmahasiswa");
// $jumlahData = mysqli_num_rows($result);

$jumlahData = count(querry("SELECT  * FROM absenmahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
var_dump($jumlahHalaman);
// if (isset($_GET["halaman"])) {
//     $halamanAktif = $_GET["halaman"];
// } else {
//     $halamanAktif = 1;
// }

$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = (($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman);


$mahasiswa = querry("SELECT * FROM absenmahasiswa LIMIT $awalData, $jumlahDataPerHalaman");


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
    <a href="logout.php">logout</a>
    <h1>Daftar Hadir Mahasiswa</h1>

    <a href="tambah.php"> Tambah Data Mahasiswa</a>
    <br><br>
    <form action="" method="post">

        <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari"> Cari</button>
    </form>
    <br><br>
    <!-- navigasi -->
    <?php if($halamanAktif > 1): ?>
    <a href="?halaman=<?= $halamanAktif-1; ?>">&lt;</a>
    <?php endif; ?>
    
    
    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif): ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
        <?php else: ?>
            <a href="?halaman=<?= $i; ?>" ><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman): ?>
    <a href="?halaman=<?= $halamanAktif+1; ?>">&gt;</a>
    <?php endif; ?>
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