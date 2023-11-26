

<?php include('inc/header.php');
session_start();
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('location:login.php');
  }
include('../config/db.php');

// Query untuk menghitung jumlah kategori
$sqlJumlahKategori = "SELECT COUNT(*) as jumlahKategori FROM kategori_buku";
$resultKategori = mysqli_query($koneksi, $sqlJumlahKategori);
$rowKategori = mysqli_fetch_assoc($resultKategori);
$jumlahKategori = $rowKategori['jumlahKategori'];

// Query untuk menghitung jumlah buku
$sqlJumlahBuku = "SELECT COUNT(*) as jumlahBuku FROM tb_buku";
$resultBuku = mysqli_query($koneksi, $sqlJumlahBuku);
$rowBuku = mysqli_fetch_assoc($resultBuku);
$jumlahBuku = $rowBuku['jumlahBuku'];

// Query untuk menghitung jumlah anggota
$sqlJumlahAnggota = "SELECT COUNT(*) as jumlahAnggota FROM user_data";
$resultAnggota = mysqli_query($koneksi, $sqlJumlahAnggota);
$rowAnggota = mysqli_fetch_assoc($resultAnggota);
$jumlahAnggota = $rowAnggota['jumlahAnggota'];

$adminName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';

?>


<?php include('inc/nav.php') ?>


<style>
    .summary-kategori{
        background-color: #0a6b4a;
        border-radius: 10px;
    }
    .summary-produk{
        background-color: #0a516b;
        border-radius: 10px;
    }
    .summary-anggota{
        background-color: #FF9C70;
        border-radius: 10px;
    }
    .no-decoration{
        text-decoration: none;
    }
    .no-decoration:hover{
        opacity: 50%;
        transition: 0.5s;
        text-decoration: none;
    }
</style>

<body>
   
    <div class="container">
    <h2 class="mt-5 text-white">Halo admin | <?php echo $adminName; ?></h2>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-kategori p-4">
                        <div class="row">
                           
                            <div class="col-12 text-white">
                                <h3 class="fs-2">Kategori</h3>
                                <p class="fs-4"><?php echo $jumlahKategori;?> Kategori</p>
                                <p><a href="kategori.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-produk p-4">
                        <div class="row">
                            
                            <div class="col-12 text-white">
                                <h3 class="fs-2">Produk</h3>
                                <p class="fs-4"><?php echo $jumlahBuku;?> Buku</p>
                                <p><a href="buku.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-anggota p-4">
                        <div class="row">
                            
                            <div class="col-12 text-white">
                                <h3 class="fs-2">Anggota</h3>
                                <p class="fs-4"><?php echo $jumlahAnggota;?> Anggota</p>
                                <p><a href="cekAkun.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>

<?php include('inc/footer.php') ?>