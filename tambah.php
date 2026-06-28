<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
include "function.php";

if (isset($_POST['simpan'])) {

    $kode = bersihkanInput($_POST['kode_buku']);
    $judul = bersihkanInput($_POST['judul']);
    $penulis = bersihkanInput($_POST['penulis']);
    $penerbit = bersihkanInput($_POST['penerbit']);
    $tahun = bersihkanInput($_POST['tahun_terbit']);

    if ($kode == "" || $judul == "" || $penulis == "" || $penerbit == "" || $tahun == "") {

        echo "<script>
                alert('Semua data wajib diisi!');
              </script>";

    } else {

        $query = mysqli_query($koneksi, "INSERT INTO buku(kode_buku, judul, penulis, penerbit, tahun_terbit)
        VALUES('$kode','$judul','$penulis','$penerbit','$tahun')");

        if ($query) {
            echo "<script>
                    alert('Data buku berhasil ditambahkan.');
                    window.location='daftar.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan!');
                  </script>";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<header>

    <div class="header">

       <img src="assets/logo.png" alt="Logo" class="logo">

        <div class="header-text">
            <h1>Sistem Pendataan Buku</h1>
            <p>Tambah Data Buku</p>
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

        <h2>Form Tambah Buku</h2>

        <form method="POST">

            <label>Kode Buku</label>
            <input type="text" name="kode_buku">

            <label>Judul Buku</label>
            <input type="text" name="judul">

            <label>Penulis</label>
            <input type="text" name="penulis">

            <label>Penerbit</label>
            <input type="text" name="penerbit">

            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" min="1900" max="2099">

            <input type="submit" name="simpan" value="Simpan">

            <input type="reset" value="Reset"
            onclick="return confirm('Apakah Anda yakin ingin mengosongkan semua isian?')">

        </form>

    </div>

</div>

<footer>

    <p>© 2026 Sistem Pendataan Buku</p>

</footer>

</body>
</html>
