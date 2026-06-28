<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
include "function.php";

$cari = "";

if (isset($_GET['cari'])) {
    $cari = bersihkanInput($_GET['cari']);

    $query = mysqli_query($koneksi, "SELECT * FROM buku
    WHERE judul LIKE '%$cari%'
    OR penulis LIKE '%$cari%'
    OR penerbit LIKE '%$cari%'
    ORDER BY id DESC");

} else {

    $query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");

}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Daftar Buku</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<header>

<div class="header">

<img src="assets/logo.png" alt="Logo" class="logo">

<div class="header-text">

<h1>Sistem Pendataan Buku</h1>

<p>Daftar Data Buku</p>

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

<h2>Daftar Buku</h2>

<br>

<form method="GET" class="search-box">

<input
type="text"
name="cari"
placeholder="Cari judul, penulis, atau penerbit..."
value="<?php echo $cari; ?>">

<input type="submit" value="Cari">

<a href="daftar.php" class="btn btn-home">Refresh</a>

</form>

<table>

<tr>

<th>No</th>

<th>Kode Buku</th>

<th>Judul</th>

<th>Penulis</th>

<th>Penerbit</th>

<th>Tahun</th>

<th>Aksi</th>

</tr>

<?php

$no = 1;

// Perulangan menampilkan data
while($data = mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $data['kode_buku']; ?></td>

<td><?= $data['judul']; ?></td>

<td><?= $data['penulis']; ?></td>

<td><?= $data['penerbit']; ?></td>

<td><?= $data['tahun_terbit']; ?></td>

<td>

<a
href="edit.php?id=<?= $data['id']; ?>"
class="btn btn-edit">

Edit

</a>

<a
href="hapus.php?id=<?= $data['id']; ?>"
class="btn btn-hapus"
onclick="return confirm('Apakah Anda yakin ingin menghapus data buku ini?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<footer>

<p>© 2026 Sistem Pendataan Buku</p>

</footer>

</body>

</html>
