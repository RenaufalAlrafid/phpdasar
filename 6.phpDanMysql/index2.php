<?php
//koneksi ke database

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM absenmahasiswa");

// ambil data dari object result (fetch)
// mysqli_fetch_row() (mengenbalikan array numerik)
// mysqli_fetxh_assoc() (mengembalikan array associative)
// mysqli_fetch_array() (mengambilkan keduanya)
// mysqli_fetch_object()

// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }





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
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Identitas</th>
            <th>Kelas</th>
            <th>Kehadiran</th>
        </tr>
        <?php $i = 1 ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href=""> ubah </a> |
                    <a href=""> hapus </a>
                </td>
                <td><?= $row["NIM"] ?></td>
                <td><?= $row["Nama"] ?></td>
                <td><?= $row["Identitas"] ?></td>
                <td><?= $row["Kelas"] ?></td>
                <td><?= $row["Kehadiran"] ?></td>
            </tr>
            <?php $i++ ?>
        <?php endwhile; ?>
    </table>
</body>

</html>