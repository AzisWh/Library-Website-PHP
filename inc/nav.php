 <?php
 
session_start();
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
    <li class="nav-item mt-2">
      <a class="nav-link" href="#">Sirkulasi</a>
    </li>
    <li class="nav-item mt-2">
      <a class="nav-link" href="logout.php">LogOut</a>
    </li>
    <li class="nav-item mt-2">
      <a class="nav-link" href="#">Contact</a>
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
							<a href="checkout.php" class="btn btn-primary btn-block text-center">checkout</a>
								<a href="tbPinjam.php" class="btn btn-primary btn-block text-center">tabel pinjam</a>
				    		</div>
				    	</div>
				    </div>
				</div> 
    </li>
    </div> 
  </ul>
</nav>