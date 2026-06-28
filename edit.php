<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
include "function.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

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

        $update = mysqli_query($koneksi, "UPDATE buku SET

            kode_buku='$kode',
            judul='$judul',
            penulis='$penulis',
            penerbit='$penerbit',
            tahun_terbit='$tahun'

            WHERE id='$id'
        ");

        if ($update) {

            echo "<script>

                alert('Data buku berhasil diperbarui.');

                window.location='daftar.php';

            </script>";

        } else {

            echo "<script>

                alert('Data gagal diperbarui!');

            </script>";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Edit Buku</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<header>

<div class="header">

<img src="assets/logo.png" alt="Logo" class="logo">

<div class="header-text">

<h1>Sistem Pendataan Buku</h1>

<p>Edit Data Buku</p>

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

<h2>Edit Buku</h2>

<form method="POST">

<label>Kode Buku</label>

<input
type="text"
name="kode_buku"
value="<?= $data['kode_buku']; ?>">

<label>Judul Buku</label>

<input
type="text"
name="judul"
value="<?= $data['judul']; ?>">

<label>Penulis</label>

<input
type="text"
name="penulis"
value="<?= $data['penulis']; ?>">

<label>Penerbit</label>

<input
type="text"
name="penerbit"
value="<?= $data['penerbit']; ?>">

<label>Tahun Terbit</label>

<input
type="number"
name="tahun_terbit"
value="<?= $data['tahun_terbit']; ?>">

<input
type="submit"
name="update"
value="Update">

<a href="daftar.php" class="btn btn-home">
Kembali
</a>

</form>

</div>

</div>

<footer>

<p>© 2026 Sistem Pendataan Buku</p>

</footer>

</body>

</html>
