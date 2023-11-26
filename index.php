<?php include('inc/header.php'); 
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
    header('location:login.php');
}
?>

<?php
include('inc/nav.php');
include('config/db.php');


$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';

?>


<h2 class="mt-5 ml-5 text-white">Halo User | <?php echo $userName?></h2>
<div class="content mt-5">
    
    <ul class="rig columns-4">
        <?php
        //select kategori checking
        $sql = "SELECT * FROM tb_buku";
        if (isset($_GET['id'])) {
            $katID = $_GET['id'];
            $sql .= " WHERE id_kat = '$katID'";
        }

        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <li>
                        <a href="#"><img class="product-image" style="max-width: 100px; max-height: 100px;" src="image/<?php echo $row["buku_cover"]; ?>"></a>
                        <h4><?php echo $row['judul_buku'] ?></h4>

                        <p><?php echo $row['deskripsi_buku'] ?></p>
                        <div class="penerbit"> <?php echo $row['buku_penulis'] ?></div>
                        <div class="status"><?php echo $row['status'] ?></div>

                        <hr>
                        <?php 
                        $status = $row['status'];
                        if ($status == 'Available') : ?>
                            <button class="btn btn-default btn-xs pull-right" type="submit" name="submit">
                                <a href="peminjaman.php?id=<?php echo $row['id'] ?>">
                                    <i class="fa fa-cart-arrow-down"></i> Peminjaman
                                </a>
                            </button>
                        <?php else : ?>
                            <button class="btn btn-default btn-xs pull-right" type="button" disabled>
                                <i class="fa fa-cart-arrow-down"></i> Sedang Dipinjam
                            </button>
                        <?php endif; ?>
                        <button class="btn btn-default btn-xs pull-left" type="button">
                            <a href="detail.php?id=<?php echo $row['id'] ?>">
                                <i class="fa fa-eye"></i> Detail Buku
                            </a>
                        </button>
                    </li>
                <?php
                }
            } else {
                echo "<h1 class='text-center text-white'>Buku Sedang Kosong</h1>";
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
        ?>
    </ul>
</div>

<?php include('inc/footer.php'); ?>
