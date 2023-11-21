<?php include("inc/header.php");
session_start();
include("config/db.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_user WHERE email='$email'";
    $result = mysqli_query($koneksi, $sql);
    
    // $countdata = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $dbStoredPASSWORD = $row['password'];

   
      if (password_verify($password, $dbStoredPASSWORD)) {
        $_SESSION['email'] = $email;
        $_SESSION['emailid'] = $row['user_id'];
        header('location:index.php');
       } else {
         header('location:login.php?message=1');
       }
}
     

?>