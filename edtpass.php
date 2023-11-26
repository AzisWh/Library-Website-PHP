<?php include('config/db.php') ?>
<?php

$row = [];
if(isset($_POST['submit'])){
    $userid = isset($_GET['userid']) ? $_GET['userid'] : null;
    $namenew = mysqli_real_escape_string($koneksi, $_POST['namenew']);
    $passnew = $_POST['passnew'];

    // Validasi
    if (empty($passnew)) {
        $error = "Password is required";
    } else {
        // encrypt password
        $hashedPassword = password_hash($passnew, PASSWORD_DEFAULT);

        // Update query
        $updateSql = "UPDATE tb_user SET nama_user = '$namenew', password = '$hashedPassword' WHERE user_id = $userid";

        // Debugging
        // var_dump($_POST);
        // var_dump($updateSql);

        if (mysqli_query($koneksi, $updateSql)) {
            $successMessage = "Password updated successfully";
        } else {
            $error = "Error updating password: " . mysqli_error($koneksi);
        }

        // Debugging
        // var_dump(mysqli_error($koneksi));
    }
}

if(isset($_GET['userid'])){
  $userid = isset($_GET['userid']) ;
  $sql = "SELECT * FROM tb_user WHERE user_id ='$userid'";
  $result = mysqli_query($koneksi, $sql);

  if ($result) {
      $row = mysqli_fetch_assoc($result);
  } else {
      // Handle error, contoh:
      die("Error: " . mysqli_error($koneksi));
  }
}


?>

<?php include('inc/header.php') ?>

<?php include('inc/nav.php');
if(isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}
?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
        Edit Password
    </div>
    <div class="card-body">
    <section id="content">
    <div class="content-blog bg-white py-3">
      <div class="container">
        <form method="post" action="edtpass.php?userid=<?php echo $_SESSION['emailid']; ?>"> 
          <div class="form-group">
            <label for="namenew">Nama Baru</label>
            <input type="text" class="form-control" name="namenew" id="namenew" >
          </div>
          <div class="form-group">
            <label for="passnew">Password Baru</label>
            <input type="password" class="form-control" name="passnew" id="passnew" >
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </section>
    </div>
  </div>
</div>

<?php include('inc/footer.php'); ?>
