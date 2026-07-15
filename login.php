<?php
session_start();
require 'fungsi.php';

// Jika user sudah login, langsung alihkan (redirect) ke halaman utama (index.php)
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// Periksa apakah tombol login telah ditekan
if (isset($_POST["login"])) {
    
    // Panggil fungsi login yang ada di fungsi.php
    if (login($_POST)) {
        // Jika berhasil, arahkan ke index.php
        header("Location: index.php");
        exit;
    } else {
        // Jika gagal, set variabel error menjadi true
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if(isset($error)) : ?>
    <p style="color:red;font-style:italic;">
        Username atau Password Salah!
    </p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="username">Masukkan usename</label> <br />
        <input type="text" name="username" required id="username"> <br />
        <label for="password">Password:</label> <br />
        <input type="password" name="password" require id="password"> <br /> 
        <button type="submit" name="login" >Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Register!</a></p>
</body>
</html>