<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");

if ($hapus) {

    echo "<script>

        alert('Data buku berhasil dihapus.');

        window.location='daftar.php';

    </script>";

} else {

    echo "<script>

        alert('Data gagal dihapus.');

        window.location='daftar.php';

    </script>";

}
?>
