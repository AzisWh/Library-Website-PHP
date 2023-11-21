<?php
 session_start();
 include('../config/db.php');
 if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  header('location:login.php');
 }
 

if(isset($_GET['user_id'])){
    $catid = $_GET['user_id'];
    $sql = "DELETE FROM tb_user WHERE user_id='$catid'";
    $result = mysqli_query($koneksi, $sql);
    header('location:cekAkun.php');


}


?>