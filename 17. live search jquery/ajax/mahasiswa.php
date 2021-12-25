<?php


require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM absenmahasiswa WHERE  Nama LIKE '%$keyword%' OR NIM LIKE '%$keyword%' OR Identitas LIKE '%$keyword%' OR Kelas LIKE '%$keyword%' OR Kehadiran LIKE '%$keyword%'";
$mahasiswa = querry($query);
?>

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