<?php
 session_start();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['pinjam'][$id]);
    header('location:tbPinjam.php');
}


?>