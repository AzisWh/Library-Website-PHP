<?php

session_start();
include('../config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
 header('location:login.php');
}
?> 
<?php include('inc/header.php') ?>
<?php include('inc/nav.php') ?>

<div class="container pt-5">
<table class='table table-bordered bg-white'>
    <thead>
        <tr>
            <td>Name</td>
            <td>Action</td>
        </tr>
    </thead>

    <?php
    $sql = "SELECT * FROM kategori_buku";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
        
        <tbody>
        <tr>
            <td><?php echo $row["nama_kategori"] ?></td>
            <td><a href='editCategory.php?id=<?php echo $row["id_kat"] ?>'>Edit</a> 
            | <a href='delKategori.php?id=<?php echo $row["id_kat"] ?>'>Delete</a></td>
        </tr>

        
        <?php
        }
      } else {
        echo "0 results";
      }


?>
       </tbody>
    
</table>
</div>




<?php include('inc/footer.php') ?>