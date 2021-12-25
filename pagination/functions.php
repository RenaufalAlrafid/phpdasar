<?php
// kalua mau ada gambar hapus semua command

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

function upload()
{
    $namafile = $_FILES['Apresiasi']['name'];
    $ukuranfile = $_FILES['Apresiasi']['size'];
    $error = $_FILES['Apresiasi']['error'];
    $tmpName = $_FILES['Apresiasi']['tmp_name'];

    // cek apakah ada gambar 
    if ($error === 4) {
        echo "<script>
        alert('Masukan gambar terlebih dahulu')
        </script>";
        return false;
    }

    // cek ekstensi file

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang Anda Upload Bukan Gambar')
        </script>";
        return false;
    }

    // cek ukuran gambar

    if ($ukuranfile > 1000000) {
        echo "<script>
        alert('ukuran file terlalu besar')
        </script>";
        return false;
    }

    // lolos pengecekan gambar siap diupload
    // generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= '$ekstensiGambar';





    move_uploaded_file($tmpName, 'img/' . $namafilebaru);

    return $namafilebaru;
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

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO absenmahasiswa VALUES('','$email', '$nama', '$nim', '$identitas', '$kehadiran', '$kelas')";


    //kalau mau  upload gambar
    // $query = "INSERT INTO absenmahasiswa VALUES('','$email', '$nama', '$nim', '$identitas', '$kehadiran', '$kelas' , '$gambar')";
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
    // $gambarLama = htmlspecialchars($data["gambarLama"]);

    // if ($_FILES['ganbar']['error'] === 4) {
    //     $gambar = $gambarLama;
    // } else {
    //     $gambar = upload();
    // }

    $query = "UPDATE absenmahasiswa SET 
    NIM = '$nim', 
    NAMA = '$nama', 
    Email = '$email', 
    Identitas = '$identitas', 
    Kehadiran = '$kehadiran', 
    Kelas = '$kelas'
    WHERE id = $id 
    ";
    // $query = "UPDATE absenmahasiswa SET 
    // NIM = '$nim', 
    // NAMA = '$nama', 
    // Email = '$email', 
    // Identitas = '$identitas', 
    // Kehadiran = '$kehadiran', 
    // Kelas = '$kelas',
    // Gambar = '$gambar'
    // WHERE id = $id 
    // ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//

function cari($keyword)
{
    $querry = "SELECT * FROM absenmahasiswa WHERE  Nama LIKE '%$keyword%' OR NIM LIKE '%$keyword%' OR Identitas LIKE '%$keyword%' OR Kelas LIKE '%$keyword%' OR Kehadiran LIKE '%$keyword%'";
    return querry($querry);
}


function registrasi($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> alert('konfirmasi password tidak seusai!') </script>";
        return false;
    }

    // enksripsi passsword
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die;

    //username udah apa belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('username sudah terdaftar') </script>";
        return false;
    }


    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
