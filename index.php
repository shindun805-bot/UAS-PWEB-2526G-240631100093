<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
include 'function.php';

$totalBuku = hitungBuku($koneksi);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Buku</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <header>

        <div class="header">

            <img src="assets/logo.png" alt="Logo" class="logo">

            <div class="header-text">

                <h1>Sistem Pendataan Buku</h1>

                <p>
                    Aplikasi Pendataan Buku Berbasis PHP Native & MySQL
                </p>

            </div>

        </div>

    </header>

   <nav>

    <a href="index.php">Home</a>

    <a href="tambah.php">Tambah Buku</a>

    <a href="daftar.php">Daftar Buku</a>

    <a href="logout.php"
       onclick="return confirm('Apakah Anda yakin ingin logout?')">
       Logout
    </a>

</nav>

    <div class="container">

        <div class="card">

            <h2>Selamat Datang</h2>

            <p>
                Selamat datang di
                <b>Sistem Pendataan Buku</b>.
                Website ini dibuat untuk membantu
                mengelola data buku secara sederhana
                menggunakan PHP Native dan MySQL.
            </p>

            <br>

            <h3>Total Buku</h3>

            <p class="info">

                📚 Jumlah Buku :
                <b><?php echo $totalBuku; ?></b>

            </p>

            <br>

            <a href="tambah.php" class="btn btn-tambah">
                + Tambah Buku
            </a>

            <a href="daftar.php" class="btn btn-home">
                Lihat Daftar Buku
            </a>

        </div>

    </div>

    <footer>

        <p>
            © 2026 Sistem Pendataan Buku
        </p>

    </footer>

</body>

</html>
