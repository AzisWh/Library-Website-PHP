<?php
include('config/db.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus buku dari session
    unset($_SESSION['pinjam'][$id]);

    // Ganti status buku ke "Available" di database atau sesuai dengan logika aplikasi kamu
    // Misalnya, jika status disimpan di tabel tb_buku, kamu bisa menggunakan query UPDATE
    // Gantilah "status_field" dengan nama kolom status di tabel tb_buku.
    
    $sqlUpdateStatus = "UPDATE tb_buku SET status = 'Available' WHERE id = '$id'";
    mysqli_query($koneksi, $sqlUpdateStatus);

    header('location:tbPinjam.php');
    exit;
}
?>
