<?php
 
// session_start();
include('config/db.php');



?> 
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Perpus-Ku</a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item mt-2">
      <a class="nav-link" href="index.php">OPAC</a>
    </li>
    <li class="nav-item dropdown mt-2">
      <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
		Kategori Buku
	</a>
		<div class="dropdown-menu">
		
            <?php
			
                $sql2 = "SELECT * FROM kategori_buku";
				$result2 = mysqli_query($koneksi, $sql2);

 					while($row2 = mysqli_fetch_assoc($result2)){
						?>
							<a class="dropdown-item" 
							href="index.php?id=<?php echo $row2['id_kat']?>">
							<?php echo $row2['nama_kategori']?>
						</a>
						<?php
					}
            ?>
     
 			
 			<!-- <a class="dropdown-item" href="#">bebas</a>
 			<a class="dropdown-item" href="#">komedi</a> -->
		</div>
    </li>
  
    <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            My Account
        </a>
        <div class="dropdown-menu">
		<?php
    $sql = "SELECT * FROM tb_user";
    $result = mysqli_query($koneksi, $sql);
	if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result)
	?>
	
	<a class="dropdown-item" href="edtpass.php?userid=<?php echo $_SESSION['emailid']; ?>">Ganti Password </a>
          <a class="dropdown-item" href="cetakkartu.php?id=<?php echo $_SESSION['emailid']; ?>">Kartu Anggota</a> 
          <a class="dropdown-item" href="logout.php">Logout</a> 
		 <?php 
	}
		  ?>
        </div>
      </li>

    <!-- Dropdown -->

    <div class='text-right ml-5'>
    <li class="nav-item dropdown">
      
              <div class="dropdown">
				    <button type="button" class="btn btn-info" data-toggle="dropdown">
						<?php
						$pinjam = $_SESSION['pinjam'] ?? [];
						$count = count($pinjam ?? []) ;
						?>
				      jumlah pinjam <span class="badge badge-pill badge-danger">
						<?php echo $count?>
					 </span>
				    </button>
				    <div class="dropdown-menu">
				    	<div class="row total-header-section">
			      			<div class="col-lg-6 col-sm-6 col-6">
			      				total : <span >
								  <?php echo $count?>
								</span>
			      			</div>
			      			
				    	</div>

						<?php 
						 foreach($pinjam as $key => $value){
							// echo $key . " : " . $value['jumlah'] . "<br>";
						
							$sql = "SELECT * FROM tb_buku WHERE id = $key";
							$result = $koneksi->query($sql);
							$row = mysqli_fetch_assoc($result)
						
								// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
							
								?>

				    	<div class="row cart-detail">
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
		    					<img class="product-image" style="max-width: 100px; max-height: 100px;" src="image/<?php echo $row['buku_cover']?>">
		    				</div>
		    				<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
		    					<p><?php echo $row['judul_buku']?></p>
		    				</div>
				    	</div>

							<?php
						}
						
					
						// $total = $total + $value['jumlah'];
						?>
				    	<!-- <div class="row cart-detail">
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="images/2.jpeg">
		    				</div>
		    				<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
		    					<p>Vivo DSC-RX100M..</p>
		    					<span class="price text-info"> $500.40</span> <span class="count"> Quantity:01</span>
		    				</div>
				    	</div>
				    	<div class="row cart-detail">
		    				<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="images/3.jpeg">
		    				</div>
		    				<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
		    					<p>Lenovo DSC-RX100M..</p>
		    					<span class="price text-info"> $445.78</span> <span class="count"> Quantity:01</span>
		    				</div>
				    	</div> -->
				    	<div class="row">
				    		<div class="col-lg-12 col-sm-12 col-12 text-center checkout">
							<!-- <a href="checkout.php" class="btn btn-primary btn-block text-center">pengembalian</a> -->
								<a href="tbPinjam.php" class="btn btn-primary btn-block text-center">tabel pinjam</a>
				    		</div>
				    	</div>
				    </div>
				</div> 
    </li>
    </div> 
  </ul>
</nav>