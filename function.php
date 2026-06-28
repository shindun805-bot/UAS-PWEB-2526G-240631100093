<?php

function bersihkanInput($data)
{
    return htmlspecialchars(trim($data));
}

function hitungBuku($koneksi)
{
    $query = mysqli_query($koneksi, "SELECT * FROM buku");
    return mysqli_num_rows($query);
}
?>
