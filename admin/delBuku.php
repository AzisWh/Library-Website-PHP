<?php
 session_start();
 include('../config/db.php');
 if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  header('location:login.php');
 }
 

if(isset($_GET['id'])){
    $catid = $_GET['id'];
   $sql = "DELETE FROM tb_buku WHERE id='$catid'";
   $result = mysqli_query($koneksi, $sql);
   header('location:buku.php');


}


?>