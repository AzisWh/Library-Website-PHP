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
                            <th>ISBN</th>
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
            <?php
        $sql2 = "SELECT * FROM kategori_buku WHERE id_kat = '{$row["id_kat"]}'";
        $result2 = mysqli_query($koneksi, $sql2);

        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
            $selected = ($row2["id_kat"] == $row["id_kat"]) ? 'selected' : '';
            ?>
            
            <?php
            echo "<td><a href='index.php?id={$row2["id_kat"]}' class='$selected'>{$row2["nama_kategori"]}</a></td>";
        } else {
            // Handle error jika query tidak berhasil dieksekusi
            echo "Error: " . mysqli_error($koneksi);
        }
        ?>
           <a href="" style="text-decoration: none;"></a>
            
            <td><?php echo $row["buku_penulis"] ?></td>
            <td><?php echo $row["tahun_terbit"] ?></td>
            <td><?php echo $row["deskripsi_buku"] ?></td>
            <td><?php echo $row["isbn_buku"] ?></td>
            <!-- <th><img src="../brimage/<?php echo $row["barcode"]; ?>" style="max-width: 100px; max-height: 100px;"></th> -->
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