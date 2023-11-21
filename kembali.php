
<?php include('inc/header.php');  ?>

<?php include('inc/nav.php'); 

include('config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}


$pinjam = $_SESSION['pinjam'] ?? [];
$kembali = $_SESSION['pengembalian'] ?? [];


// print_r($pinjam);
?>



<div class="container">
    <h2 class='text-center text-white'>CETAK STRUK PENGEMBALIAN</h2>

   <table class="table table-bordered bg-white">
       <tr>
           <th>Cover</th>
           <th>Judul</th>
           <th>jumlah</th>

           <th>Tanggal Pinjam</th>
           <th>Tanggal Pengembalian</th>
           <th>Status</th>
           
           
       </tr>

        <?php 
        foreach($pinjam as $key => $value){
            // echo $key . " : " . $value['jumlah'] . "<br>";
        
            $sql = "SELECT * FROM tb_buku WHERE id = $key";
            $result = $koneksi->query($sql);
            $row = mysqli_fetch_assoc($result);

            // Menghitung selisih hari
            $tanggalPinjam = new DateTime($value['tanggalPinjam']);
            $tanggalPengembalian = new DateTime($kembali['tanggal_pengembalian']);
            $selisihHari = $tanggalPinjam->diff($tanggalPengembalian)->days;
            
             // Menentukan status
             if ($kembali) {
                if ($selisihHari > 5) {
                    $status = 'Terlambat';
                } else {
                    $status = 'Tepat Waktu';
                }
            } else {
                $status = 'Belum Dikembalikan';
            }
             
                ?>
                    <tr>
           <td><img class="product-image" style="max-width: 100px; max-height: 100px;" src="image/<?php echo $row['buku_cover']?>" alt=""></td>
           <td><?php echo $row['judul_buku']?></td>
           <td><?php echo $value['jumlah']?></td>
           <td><?php echo $value['tanggalPinjam']?></td>
           <td><?php echo $kembali ? $kembali['tanggal_pengembalian'] : 'Belum Dikembalikan' ?></td>
           <td><?php echo $status ?></td>
          
        </tr>
    
                <?php
                }
                
            
                // $total = $total + $value['jumlah'];
                ?>
   </table>

   <div class="text-right">
    <a href="index.php" class="btn btn-primary btn-block text-center">KEMBALI</a>
    </div>
   


</div>
</div>

<?php include('inc/footer.php')?>