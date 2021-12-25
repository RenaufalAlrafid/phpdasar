<?php

// $mahasiswa = [
//     ["Renaufal", "12345678", "Geofisika", "email"],
//     ["alrafid", "12345678", "Geologi", "amil"]
// ];

// array acociative
// keynya string yang dibuat sendiri 
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

echo $mahasiswa[1]['email'];

?>



<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>nama :<?= $mhs[0]; ?></li>
            <li><?= $mhs[1]; ?></li>
            <li><?= $mhs[2]; ?></li>
            <li><?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach; ?>





</body>

</html> -->