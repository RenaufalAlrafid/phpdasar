<?php
// cek apkaah tombol sudah ditekan

if (isset($_POST["submit"])) {
    // cek ussername dan pasword
    if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
        // jika benar, redirect ke halaman admin
        header("Location: admin.php");
        exit;
    } else {
        // jika salah , tampilkan pesan kesalahan
        $pesan = true;
    }
}

var_dump($_POST);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Login Admin</title>
</head>

<body>
    <h1>Login Admin</h1>

    <?php if (isset($pesan)) : ?>
        <p>Username dan password salah</p>
    <?php endif; ?>

    <ul>
        <form action="" method="post">
            <li>
                <label for="username"> Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password"> Password :</label>
                <input type="Password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="submit">login</button>
            </li>

        </form>
    </ul>
</body>

</html>