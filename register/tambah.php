<?php

require 'functions.php';

if (isset($_POST["submit"])) {


    // cek berhasil atau tidak
    // var_dump(mysqli_affected_rows($conn));
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data Berhasil dirambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal dirambahkan');
        document.location.href = 'tambah.php';
        </script>
        ";
    }
    var_dump($_FILES);
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
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Email">Email :</label>
                <input type="text" name="Email" id="Email" required>

            </li>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" required>
            </li>
            <li>
                <label for="Identitas">Identitas :</label>
                <input type="text" name="Identitas" id="Identitas" required>
            </li>
            <li>
                <label for="NIM">NIM :</label>
                <input type="text" name="NIM" id="NIM" required>
            </li>
            <li>
                <label for="Kehadiran">Kehadiran :</label>
                <input type="text" name="Kehadiran" id="Kehadiran" required>
            </li>
            <li>
                <label for="Kelas">Kelas :</label>
                <input type="text" name="Kelas" id="Kelas" required>
            </li>
            <li>
                <label for="Apresiasi">Apresiasi :</label>
                <input type="file" name="Apresiasi" id="Apresiasi" >
            </li>
            <li>
                <button type="submit" name="submit"> Tambah Data</button>
            </li>
        </ul>
    </form>


</body>

</html>