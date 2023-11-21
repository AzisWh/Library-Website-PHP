<?php

session_start();
include('../config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
 header('location:login.php');
}



if(isset($_POST['submit'])){
$kategoriNama = $_POST['kategoriNama'];

$sql = "INSERT INTO kategori_buku (nama_kategori) VALUES ('$kategoriNama')";

if (mysqli_query($koneksi, $sql)) {
  echo "Kategori created successfully";
  header('location:kategori.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

}


?> 

<?php include('inc/header.php') ?>
<?php include('inc/nav.php') ?>

<div class="container mt-5">

<div class="card">
    <div class="card-header">
        Tambah Kategori
    </div>
    <div class="card-body">

    <form action="addKategori.php" method='post'>
             <div class="form-group">
            <label for="kategoriNama"> Name:</label>
            <input type="text" class="form-control" id="kategoriNama" name='kategoriNama'>
            </div> 
            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </form>

    </div>
</div>



</div>







<?php include('inc/footer.php') ?>