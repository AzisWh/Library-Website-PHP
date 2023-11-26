
<?php include('inc/header.php');

if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
	header('location:login.php');
  }
  ?>

<?php include('inc/nav.php');  
include('config/db.php');


$pinjam = $_SESSION['pinjam'] ?? [];
$userData = $_SESSION['userData'] ?? [];

if (isset($_POST['submit'])) {
    $namaDepan = $_POST['namadepan'];
    $namaBelakang = $_POST['namabelakang'];
    $Prodi = $_POST['prodi'];
    $NIM = $_POST['NIM'];
    $Mobile = $_POST['mobile'];
    $Usid = $_SESSION['emailid'];

	// Simpan data ke dalam variabel sesi
    $_SESSION['userData'] = [
        'namadepan' => $namaDepan,
        'namabelakang' => $namaBelakang,
        'prodi' => $Prodi,
        'NIM' => $NIM,
        'mobile' => $Mobile,
    ];

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
				$_SESSION['userData'] = [
                    'namadepan' => $namaDepan,
                    'namabelakang' => $namaBelakang,
                    'prodi' => $Prodi,
                    'NIM' => $NIM,
                    'mobile' => $Mobile,
                ];
            }
        } else {
            // jika belum maka harus insert
            // insert query
            $insertSql = "INSERT INTO user_data (userid, namadepan, namabelakang, prodi, NIM, mobile) 
            VALUES ('$Usid','$namaDepan','$namaBelakang', '$Prodi','$NIM','$Mobile')";

            $inserted = mysqli_query($koneksi, $insertSql);
            if ($inserted) {
                // echo 'peminjaman buku - updt';
				$_SESSION['userData'] = [
                    'namadepan' => $namaDepan,
                    'namabelakang' => $namaBelakang,
                    'prodi' => $Prodi,
                    'NIM' => $NIM,
                    'mobile' => $Mobile,
                ];
            }
        }
    } else {
        echo "Query failed: " . mysqli_error($koneksi);
    }
}


// echo $_SESSION['email'] .  "<br>";
// echo $_SESSION['emailid'] .  "<br>";
?>
 
 

<div class="container text-white">

    <section id="content">
		<div class="content-blog">
					<div class="page_header text-center  py-5">
						<h2>Cetak Kartu Anggota</h2>
						<p>Isi data ini dibawah</p>
					</div>

<div class="container ">
<form method="post" action="cetakkartu.php">
			<div class="row">
			
				<div class="offset-md-2 col-md-8">
					<div class="billing-details">
						<h3 class="uppercase">Kartu Keanggotaan</h3>
						<div class="space30"></div>
					
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input class="form-control" name="namadepan" placeholder="Nama depan" 
									value="<?php if(isset($userData['namadepan'])){
												echo $userData['namadepan'];
											}?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name="namabelakang" placeholder="Nama depan" 
									value="<?php if(isset($userData['namabelakang'])){
										echo $userData['namabelakang'];
									}?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Prodi</label>
							<input class="form-control" name="prodi" placeholder="Prodi" 
							value="<?php if(isset($userData['prodi'])){
										echo $userData['prodi'];
									}?>" type="text">
							<div class="clearfix space20"></div>
							<label>Nim </label>
							<input class="form-control" name="NIM" placeholder="Nim"
							value="<?php if(isset($userData['NIM'])){
										echo $userData['NIM'];
									}?>" type="text">
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input class="form-control" name="mobile" id="billing_phone" placeholder="No Hp Aktif" 
							value="<?php if(isset($userData['mobile'])){
										echo $userData['mobile'];
									}?>" type="text">
						
					</div>
					<button 
				type="submit" name="submit" class="btn btn-primary"">
				Input Data User
					</button>
				</div>
			</form>
				
			

	
</div>







<?php include('inc/footer.php');  ?>


