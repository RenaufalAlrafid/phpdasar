<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

// ambil data di url

$id = $_GET["id"];
// querry data mahasiswa berdasarkan id
$mhs = querry("SELECT * FROM absenmahasiswa WHERE id = $id")[0];

var_dump($mhs);


if (isset($_POST["submit"])) {
    // cek berhasil atau tidak
    // var_dump(mysqli_affected_rows($conn));
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data Berhasil diubah');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah');
        document.location.href = 'index.php';
        </script>
        ";
    }
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <!-- kalau mau ada gambar hapus semua commanc -->
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <!-- <input type="hidden" name="gambarLama" value="<(hapus)?= $mhs["gambar"]; ?>"> -->
        <ul>
            <li>
                <label for="Email">Email :</label>
                <input type="text" name="Email" id="Email" required value="<?= $mhs["Email"]; ?>">

            </li>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" required value="<?= $mhs["Nama"]; ?>">
            </li>
            <li>
                <label for="Identitas">Identitas :</label>
                <input type="text" name="Identitas" id="Identitas" required value="<?= $mhs["Identitas"]; ?>">
            </li>
            <li>
                <label for="NIM">NIM :</label>
                <input type="text" name="NIM" id="NIM" required value="<?= $mhs["NIM"]; ?>">
            </li>
            <li>
                <label for="Kehadiran">Kehadiran :</label>
                <input type="text" name="Kehadiran" id="Kehadiran" required value="<?= $mhs["Kehadiran"]; ?>">
            </li>
            <li>
                <label for="Kelas">Kelas :</label>
                <input type="text" name="Kelas" id="Kelas" required value="<?= $mhs["Kelas"]; ?>">
            </li>
            <!-- <li>
                <label for="Gambar">Apresiasi :</label>
                <img src="img/<(hapus)?= $mhs['gambar'] ?>" alt="gambar apresiasi">

                <input type="file" name="Gambar" id="Gambar" >
            </li> -->
            <li>
                <button type="submit" name="submit"> Ubah Data</button>
            </li>
        </ul>
    </form>


</body>

</html>