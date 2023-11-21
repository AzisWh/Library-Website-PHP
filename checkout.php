

<?php 


?>
<?php include('inc/header.php') ?>

<?php include('inc/nav.php');  
include('config/db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}

$pinjam = $_SESSION['pinjam'] ?? [];

if (isset($_POST['submit'])) {
    $namaDepan = $_POST['namadepan'];
    $namaBelakang = $_POST['namabelakang'];
    $Prodi = $_POST['prodi'];
    $NIM = $_POST['NIM'];
    $Mobile = $_POST['mobile'];
    $Usid = $_SESSION['emailid'];

    // select data from user_data table
    $sql = "SELECT * FROM user_data WHERE userid = $Usid";
    $result = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($result);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // menyimpan inputan sesuai id
            // update query
            $updateSql = "UPDATE user_data SET namadepan = '$namaDepan', namabelakang = '$namaBelakang',
            prodi = '$Prodi', NIM = '$NIM', mobile = '$Mobile'
            WHERE userid = $Usid";

            $updated = mysqli_query($koneksi, $updateSql);
            if ($updated) {
                // echo 'peminjaman buku - inst ';
            }
        } else {
            // jika belum maka harus insert
            // insert query
            $insertSql = "INSERT INTO user_data (userid, namadepan, namabelakang, prodi, NIM, mobile) 
            VALUES ('$Usid','$namaDepan','$namaBelakang', '$Prodi','$NIM','$Mobile')";

            $inserted = mysqli_query($koneksi, $insertSql);
            if ($inserted) {
                // echo 'peminjaman buku - updt';
            }
        }
    } else {
        echo "Query failed: " . mysqli_error($koneksi);
    }
}

if (isset($_GET['submit'])) {
   
    $tanggal_pengembalian = isset($_GET['tanggal_pengembalian']) ? $_GET['tanggal_pengembalian'] : date('Y-m-d');

    $_SESSION['pengembalian'] = array( 'tanggal_pengembalian' => $tanggal_pengembalian);

    header('location:kembali.php');
   
}
// echo $_SESSION['email'] .  "<br>";
// echo $_SESSION['emailid'] .  "<br>";
?>
 
 

<div class="container text-white">

    <section id="content">
		<div class="content-blog">
					<div class="page_header text-center  py-5">
						<h2>Shop - Checkout</h2>
						<p>Get the best kit for smooth shave</p>
					</div>

<div class="container ">
<form method="post">
			<div class="row">
			
				<div class="offset-md-2 col-md-8">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
					
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input class="form-control" name="namadepan" placeholder="Nama depan" 
									value="<?php if(isset($row['namadepan'])){
										echo $row['namadepan'];
									}?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name="namabelakang" placeholder="Nama depan" 
									value="<?php if(isset($row['namabelakang'])){
										echo $row['namabelakang'];
									}?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Prodi</label>
							<input class="form-control" name="prodi" placeholder="Prodi" 
							value="<?php if(isset($row['prodi'])){
										echo $row['prodi'];
									}?>" type="text">
							<div class="clearfix space20"></div>
							<label>Nim </label>
							<input class="form-control" name="NIM" placeholder="Nim"
							value="<?php if(isset($row['NIM'])){
										echo $row['NIM'];
									}?>" type="text">
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input class="form-control" name="mobile" id="billing_phone" placeholder="No Hp Aktif" 
							value="<?php if(isset($row['mobile'])){
										echo $row['mobile'];
									}?>" type="text">
						
					</div>
					<button 
				type="submit" name="submit" class="btn btn-primary">
				Input Data User
					</button>
				</div>
			</form>
				
				
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Dikembalikan pada : </h4>
			
			<div class="container">
    <h2 class='text-center text-white'>Cart</h2>

	<form method="get" action="checkout.php">

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
				<td><input type="date" name="tanggal_pengembalian" required></td>
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


