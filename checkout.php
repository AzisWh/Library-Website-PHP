

<?php include('inc/header.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
	header('location:login.php');
  }
$pinjam = $_SESSION['pinjam'] ?? [];

if (isset($_GET['submit'])) {
    // Pastikan untuk membersihkan dan memvalidasi input tanggal sesuai kebutuhan aplikasi Anda
    $tanggal_pengembalian = isset($_GET['tanggal_pengembalian']) ? $_GET['tanggal_pengembalian'] : date('Y-m-d');

    // Simpan tanggal pengembalian ke dalam sesi
    $_SESSION['pengembalian'] = array('tanggal_pengembalian' => $tanggal_pengembalian);

    // Arahkan ke halaman kembali.php
    header('location:kembali.php');
    exit(); // Pastikan skrip berhenti setelah pengalihan
}
?>

<?php include('inc/nav.php');  
include('config/db.php');



// echo $_SESSION['email'] .  "<br>";
// echo $_SESSION['emailid'] .  "<br>";
?>
 
 

<div class="container text-white mt-5">

   
			
			<div class="space30"></div>
			<h4 class="heading">Dikembalikan pada : </h4>
			
			<div class="container">
    <h2 class='text-center text-white'>Tabel</h2>

	<form action="checkout.php" method="get">

		<table class="table table-bordered ">
			<tr>
				<th>Cover</th>
				<th>Judul</th>
				<th>jumlah</th>

				<th>Tanggal Pengembalian</th>
					
				
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
				<td><?php echo $value['jumlah']?></td>
				<td><input type="date" name="tanggal_pengembalian"  required></td>
				</tr>
			
						<?php
						}
						
					
						// $total = $total + $value['jumlah'];
						?>
		
		</table>

        <div class="row">
            <div class="col-md-12 text-center p-2">
			<button 
				type="submit" name="submit" class="btn btn-primary">
				Cetak Struk
			</button>
            </div>
        </div>
		
		
		</div>
	</form>

</div>








<?php include('inc/footer.php');  ?>


