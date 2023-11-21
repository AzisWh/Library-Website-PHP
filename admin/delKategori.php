<?php
 session_start();
 include('../config/db.php');
 if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  header('location:login.php');
 }
 

if(isset($_GET['id'])){
    $catid = $_GET['id'];
   $sql = "DELETE FROM kategori_buku WHERE id_kat='$catid'";
   $result = mysqli_query($koneksi, $sql);
   header('location:kategori.php');


}


?>