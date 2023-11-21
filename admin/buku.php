<?php

session_start();
include('../config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
 header('location:login.php');
}
?>
<?php include('inc/header.php') ?>
<?php include('inc/nav.php') ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Keseluruhan Buku
        </div>
        <div class="card-body">
        <section id="content mt-5 ">
        <div class="content-blog bg-white">
            <div class="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Judul Buku</th>
                            <th>Kategori Buku</th>
                            <th>Penulis Buku</th>
                            <th>Tahun Terbit </th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    $sql = "SELECT * FROM tb_buku";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
        
        <tr>
            <td><img src="../image/<?php echo $row["buku_cover"]; ?>" style="max-width: 100px; max-height: 100px;"></td>
            <td><?php echo $row["judul_buku"] ?></td>
            <td><?php echo $row["id_kat"] ?></td>
            <td><?php echo $row["buku_penulis"] ?></td>
            <td><?php echo $row["tahun_terbit"] ?></td>
            <td><?php echo $row["deskripsi_buku"] ?></td>
            <td><a href='editBuku.php?id=<?php echo $row["id"] ?>'>Edit</a> 
            | <a href='delBuku.php?id=<?php echo $row["id"] ?>'>Delete</a></td>
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
        </div>
    </section>
        </div>
    </div>
</div>


<?php include('inc/footer.php') ?>