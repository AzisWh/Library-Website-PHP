
<?php 
session_start();
include('../config/db.php');
// require_once('../vendor/autoload.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}
?>
<?php include('inc/header.php') ?>


<?php include('inc/nav.php');

if(isset($_POST['submit'])){
  $buku_judul = mysqli_real_escape_string($koneksi, $_POST['judulbuku']);
  $buku_deskripsi = mysqli_real_escape_string($koneksi, $_POST['descbuku']);
  $buku_kategori = $_POST['kategoribuku'];
  $buku_penulis = mysqli_real_escape_string($koneksi, $_POST['penulisbuku']);
  $buku_tahun = $_POST['tbitbuku'];
  $buku_cover = $_FILES['coverbuku']['name'];
  $buku_isbn = $_POST['isbnbuku'];


  // $barcode = '../brimage/' . time(). ".png";
  // $barimage = time().".png";
  // $color = [255,0,0];
  // $bartext = $buku_judul;

  $sql = "INSERT INTO tb_buku (judul_buku, id_kat, buku_penulis,
          tahun_terbit, buku_cover, deskripsi_buku, isbn_buku) 
          VALUES ('$buku_judul','$buku_kategori','$buku_penulis','$buku_tahun'
          ,'$buku_cover','$buku_deskripsi','$buku_isbn')";
   if (mysqli_query($koneksi, $sql)) {
    $target_dir = "../image/"; // Ganti dengan direktori tempat Anda ingin menyimpan file
    $target_file = $target_dir . basename($_FILES['coverbuku']['name']);

    if (move_uploaded_file($_FILES['coverbuku']['tmp_name'], $target_file)) {
      $message = 'berhasil ditambah';
    } else {
        $message = 'Maaf, terjadi kesalahan saat mengunggah file.';
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
//barcode generator
// $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
// file_put_contents($barcode, $generator->getBarcode($bartext, 
// $generator::TYPE_CODE_128, 3, 50, $Color));

}



?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
        Tambah Buku
    </div>
    <div class="card-body">
    <section id="content">
    <div class="content-blog bg-white py-3">
      <div class="container">
        <?php 
        if(isset($message)){
          ?>
          <div class="alert alert-success"><?php echo $message;?></div>
          <?php
        }
        ?>
        <form method="post" enctype="multipart/form-data" action="addBuku.php">
          <div class="form-group">
            <label for="Judulbuku">Judul Buku</label>
            <input type="text" class="form-control" name="judulbuku" id="Judulbuku" placeholder="JudulBuku">
          </div>
          <div class="form-group">
            <label for="Descbuku">Deskripsi Buku</label>
            <textarea class="form-control" name="descbuku" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="isbnbuku">ISBN</label>
            <input class="form-control" type="text" name="isbnbuku" ></input>
          </div>
          <div class="form-group">
            <label for="Kategoribuku">Kategori Buku</label>
            <select class="form-control" id="Kategoribuku" name="kategoribuku">
            <option value="" selected disabled>-----Pilih Kategori-----</option>

            <?php

            $sql = "SELECT * FROM Kategori_buku";
            $result = mysqli_query($koneksi, $sql);

                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
        
                    ?>
                
             
              <option value="<?php echo $row["id_kat"] ?>"><?php echo $row["nama_kategori"] ?></option>
              <!-- <option value="Options">Options</option>
              <option value="Options">Options</option>
              <option value="Options">Options</option>
                 -->
                <?php
                }
              
            ?>


              
            </select>
          </div>
          <div class="form-group">
            <label for="Penulisbuku">Penulis Buku</label>
            <input type="text" class="form-control" name="penulisbuku" id="Penulisbuku" placeholder="PenulisBuku">
          </div>
          <div class="form-group">
            <label for="Tbitbuku">Tahun Terbit</label>
            <input type="number" class="form-control" name="tbitbuku" id="Tbitbuku" placeholder="Tbitbuku">
          </div>
          
          <div class="form-group">
            <label for="Coverbuku">Cover Buku</label>
            <input type="file" name="coverbuku" id="Coverbuku" >
            <p class="help-block">jpg/png saja</p>
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </section>
    </div>
  </div>
</div>

<?php include('inc/footer.php'); ?>