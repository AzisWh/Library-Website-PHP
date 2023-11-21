
<?php include('inc/header.php');  ?>

<?php include('inc/nav.php'); 

include('config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}


$pinjam = $_SESSION['pinjam'] ?? [];


// print_r($pinjam);
?>



<div class="container">
    <h2 class='text-center text-white'>Cart</h2>

   <table class="table table-bordered bg-white">
       <tr>
           <th>Cover</th>
           <th>Judul</th>
           <th>Penulis</th>
           <th>jumlah</th>

           <th>Tanggal Pinjam</th>
           
           <th>Tahun Terbit</th>       
           <th>Action</th>
           
       </tr>

        <?php 
        foreach($pinjam as $key => $value){
            // echo $key . " : " . $value['jumlah'] . "<br>";
        
            $sql = "SELECT * FROM tb_buku WHERE id = $key";
            $result = $koneksi->query($sql);
            $row = mysqli_fetch_assoc($result)
                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
             
                ?>
                    <tr>
           <td><img class="product-image" style="max-width: 100px; max-height: 100px;" src="image/<?php echo $row['buku_cover']?>" alt=""></td>
           <td><?php echo $row['judul_buku']?></td>
           <td><?php echo $row['buku_penulis']?></td>
           <td><?php echo $value['jumlah']?></td>
           <td><?php echo $value['tanggalPinjam']?></td>
           <td><?php echo $row['tahun_terbit']?></td>
           <td><a href='hapusPinjam.php?id=<?php echo $key;?>'>Hapus</a></td>
        </tr>
    
                <?php
                }
                
            
                // $total = $total + $value['jumlah'];
                ?>
         
            
          

       
        <!-- <tr>
            <td><img src="images/2.jpeg" alt=""></td>
            <td>Tshirt</td>
            <td>300</td>
            <td>1</td>
            <td>300</td>
         </tr>
         <tr>
            <td><img src="images/3.jpeg" alt=""></td>
            <td>Tshirt</td>
            <td>300</td>
            <td>1</td>
            <td>300</td>
         </tr> -->
   </table>

   <div class="text-right">
    <!-- <button class="btn mr-3">Update Cart</button> -->
    <a href="checkout.php" class="btn btn-primary btn-block text-center">CHECKOUT</a>
    </div>
   


</div>
</div>

<?php include('inc/footer.php')?>