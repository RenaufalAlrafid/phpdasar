<?php

//SUPERGLOBALS
// variable global milik php
// merupakan array asicuative

// $_get


$mahasiswa = [
    [
        "nama" => "Renaufal",
        "nrp" => "123456789",
        "email" => "yolo.com",
        "jurusan" => "geofisika"
    ],
    [
        "nama" => "Renaufal2",
        "nrp" => "123456782",
        "email" => "yolo2.com",
        "jurusan" => "geofisika2"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>

<body>
    <h1>Daftar mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"] ?>&nrp=<?= $mhs['nrp'] ?>&email=<?= $mhs['email'] ?>&jurusan=<?= $mhs['jurusan'] ?>"> <?= $mhs["nama"] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>