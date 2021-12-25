<?php

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function querry($querry)
{
    global $conn;
    $result = mysqli_query($conn, $querry);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $email = htmlspecialchars($data["Email"]);
    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["NIM"]);
    $identitas = htmlspecialchars($data["Identitas"]);
    $kehadiran = htmlspecialchars($data["Kehadiran"]);
    $kelas = htmlspecialchars($data["Kelas"]);

    $query = "INSERT INTO absenmahasiswa VALUES('','$email', '$nama', '$nim', '$identitas', '$kehadiran', '$kelas')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM absenmahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $email = htmlspecialchars($data["Email"]);
    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["NIM"]);
    $identitas = htmlspecialchars($data["Identitas"]);
    $kehadiran = htmlspecialchars($data["Kehadiran"]);
    $kelas = htmlspecialchars($data["Kelas"]);

    $query = "UPDATE absenmahasiswa SET 
    NIM = '$nim', 
    NAMA = '$nama', 
    Email = '$email', 
    Identitas = '$identitas', 
    Kehadiran = '$kehadiran', 
    Kelas = '$kelas'
    WHERE id = $id 
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//

function cari($keyword)
{
    $querry = "SELECT * FROM absenmahasiswa WHERE  Nama LIKE '%$keyword%' OR NIM LIKE '%$keyword%' OR Identitas LIKE '%$keyword%' OR Kelas LIKE '%$keyword%' OR Kehadiran LIKE '%$keyword%'";
    return querry($querry);
}
