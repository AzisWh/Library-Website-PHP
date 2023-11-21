<!-- koneksi database -->

<?php
    $host = "localhost"; // Ganti dengan nama host database Anda
    $username = "root"; // Ganti dengan nama pengguna database Anda
    $password = "";
    $dbname = "perpus";

    // Membuat koneksi ke database
    $koneksi = mysqli_connect($host, $username, $password, $dbname);

    // Memeriksa koneksi
    if (mysqli_connect_error()) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>