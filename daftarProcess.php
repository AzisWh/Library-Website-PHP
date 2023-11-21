<?php include("inc/header.php");
session_start();
include("config/db.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $namaUser = mysqli_real_escape_string($koneksi, $_POST['namaUser']);

    // $sql = "SELECT * FROM tb_user WHERE email='$email' and password='$password'";
    $sql = "INSERT INTO tb_user (email, password, nama_user) VALUES ('$email','$password','$namaUser')";
    // $result = mysqli_query($koneksi, $sql);


    if(mysqli_query($koneksi, $sql)){
        $_SESSION['email'] = $email;
        $_SESSION['emailid'] = mysqli_insert_id($koneksi);
       header('location:login.php?message=3');
    }else {
        header('location:login.php?message=2');
       
        echo ("Description Error :" . mysqli_error($koneksi));
      }

    // if (mysqli_num_rows($result)>0) {
    //    $_SESSION['email'] = $email;
    //    header('location:index.php');
    //   } else {
    //     header('location:login.php?message=1');
    //   }
     
}
?>