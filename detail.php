
<?php include('inc/header.php');  ?>

<?php include('inc/nav.php');  ?>
<?php 
include('config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}
?>
<?php
if(isset($_GET['id'])){
    $idbuku = $_GET['id'];
    $sql = "SELECT * FROM tb_buku WHERE id ='$idbuku'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle error, contoh:
        die("Error: " . mysqli_error($koneksi));
    }
}
?>
 
 
 
<div class="container">
    <div class="row text-white">
        <div class="col-md-6 ">
            <img src="image/<?php echo $row["buku_cover"]; ?>" alt="" class='img-fluid' style='height:500px;width:500px;'>
        </div>
        <div class="col-md-6 pt-5">
        <h3><b><?php echo $row["judul_buku"]; ?></b></h3>
        <h4>Deskripsi Buku : <br> <b><?php echo $row["deskripsi_buku"]; ?></b></h2>
        <h4>Penulis Buku : <br> <b><?php echo $row["buku_penulis"]; ?></b></h2>



<div class="row">
    <div class="col-md-4">
        <h4>Jumlah :</h4>
    </div>
    <div class="col-md-4">
        <form action="peminjaman.php" method="get">
            <input type="hidden" name="id" value="<?php echo $idbuku; ?>">
            <label for="tanggalPinjam">Tanggal Peminjaman</label>
            <input type="date" class="form-control" name="tanggalPinjam" value="<?php echo isset($_GET['tanggalPinjam']) ? $_GET['tanggalPinjam'] : date('Y-m-d'); ?>" required>
            <input type="number" class="form-control" name="jumlah">
            
    </div>
</div>
        
                   
       
<div class="row ">
    <div class="col-md-12 category">

    <?php
        $sql2 = "SELECT * FROM kategori_buku WHERE id_kat = '{$row["id_kat"]}'";
        $result2 = mysqli_query($koneksi, $sql2);

        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
            $selected = ($row2["id_kat"] == $row["id_kat"]) ? 'selected' : '';
            ?>
            Categories -
            <?php
            echo "<a href='index.php?id={$row2["id_kat"]}' class='$selected'>{$row2["nama_kategori"]}</a>";
        } else {
            // Handle error jika query tidak berhasil dieksekusi
            echo "Error: " . mysqli_error($koneksi);
        }
        ?>

<!-- <div class="col-md-12 category">
    Tags - <a href="#">Tag 1</a>, <a href="#">Tag 2</a>, <a href="#">Tag 3</a>
</div> -->
        <!-- <div class="row">
            <div class="col-md-4">
                Tanggal Peminjaman :
            </div>
            <div class="col-md-4">
                <form >
                <input type="date" class="form-control" name="tanggalPinjam">
                </form>
            </div>
        </div> -->

<div class="row mt-4">
    <div class="col-md-4">
                    <button class="btn btn-default btn-xs pull-right" type="submit" name="submit">
                        <a href="peminjaman.php?id=<?php echo $row['id']?>">
                        <i class="fa fa-cart-arrow-down"></i> Peminjaman
                        </a>
                    </button>
    </div>
</div>

</form>
</div>
        
        </div>
</div>





<?php include('inc/footer.php');  ?>



