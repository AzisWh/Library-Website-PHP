<?php
include('config/db.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari sesi
    unset($_SESSION['pinjam'][$id]);

    $sqlUpdateStatus = "UPDATE tb_buku SET status = 'Available' WHERE id = '$id'";
    mysqli_query($koneksi, $sqlUpdateStatus);

    // echo "Data berhasil dihapus";
    header('location: index.php');
    exit;
} else {
    echo "ID tidak ditemukan";
}
?>