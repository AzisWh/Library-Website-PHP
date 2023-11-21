<?php
session_start();

if(isset($_GET['id'])){
    if(isset($_GET['jumlah'])){
        $jumlah = $_GET['jumlah'];
    }else{
        $jumlah = 1;
    }

    $id = $_GET['id']; 
    $tanggalPinjam = isset($_GET['tanggalPinjam']) ? $_GET['tanggalPinjam'] : date('Y-m-d');

    $_SESSION['pinjam'][$id] = array('jumlah' => $jumlah, 'tanggalPinjam' => $tanggalPinjam);

    header('location: tbPinjam.php');
    // echo '<pre>';
    // print_r($_SESSION['pinjam']);
    // echo '<pre>';
    
}
?>
