
<?php include('inc/header.php');  ?>

<?php include('inc/nav.php');  
include('config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}
?>


 


<div class="content mt-5">
            <ul class="rig columns-4">


        <?php

        $sql = "SELECT * FROM tb_buku"; 
        $result = mysqli_query($koneksi, $sql);
        
        
          while($row = mysqli_fetch_assoc($result)) {
            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
         
            ?>
                <li>
                    <a href="#"><img class="product-image" style="max-width: 100px; max-height: 100px;" src="image/<?php echo $row["buku_cover"]; ?>"></a>
                    <h4><?php echo $row['judul_buku']?></h4>
                     
                    <p><?php echo $row['deskripsi_buku']?></p>
                    <div class="penerbit"> <?php echo $row['buku_penulis']?></div>
                    
                    <hr>
                    <button class="btn btn-default btn-xs pull-right" type="submit">
                        <a href="peminjaman.php?id=<?php echo $row['id']?>">
                        <i class="fa fa-cart-arrow-down"></i> Peminjaman
                        </a>
                    </button>
                    <button class="btn btn-default btn-xs pull-left" type="button">
                        <a href="detail.php?id=<?php echo $row['id']?>">
                        <i class="fa fa-eye"></i> Detail Buku
                        </a>
                    </button>
                </li>

            <?php
            }
        

            ?>



                <!-- <li>
                <a href="#"><img class="product-image" src="image/Ricky.png"></a>
                    <h4>Image Title</h4>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <div class="penerbit"> dea giraldi</div>
                    
                    <hr>
                    <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Peminjaman
                    </button>
                    <button class="btn btn-default btn-xs pull-left" type="button">
                        <i class="fa fa-eye"></i> Details
                    </button>
                </li>
                <li>
                <a href="#"><img class="product-image" src="image/Ricky.png"></a>
                    <h4>Image Title</h4>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <div class="penerbit"> dea giraldi</div>
                    
                    <hr>
                    <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Peminjaman
                    </button>
                    <button class="btn btn-default btn-xs pull-left" type="button">
                        <i class="fa fa-eye"></i> Details
                    </button>
                </li>
                <li>
                <a href="#"><img class="product-image" src="image/Ricky.png" ></a>
                    <h4>Image Title</h4>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <div class="penerbit"> dea giraldi</div>
                    
                    <hr>
                    <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Peminjaman
                    </button>
                    <button class="btn btn-default btn-xs pull-left" type="button">
                        <i class="fa fa-eye"></i> Details
                    </button>
                </li> -->
             
            </ul>
        </div>










        <?php include('inc/footer.php');  ?>


