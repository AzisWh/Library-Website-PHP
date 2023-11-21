<?php include('../config/db.php') ?>
<?php
session_start();
if(isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}

$row = []; // Inisialisasi $row untuk menghindari kesalahan jika tidak ada parameter 'id'
if(isset($_POST['submit'])){
    $idbuku = $_GET['id'];
    $judul_buku = $_POST['judulbuku'];
    $deskripsi_buku = $_POST['descbuku'];
    $id_kat = $_POST['kategoribuku'];
    $buku_penulis = $_POST['penulisbuku'];
    $tahun_terbit = $_POST['tbitbuku'];

    // Cek apakah ada file yang diunggah
    if(isset($_FILES['coverbuku']['name']) && $_FILES['coverbuku']['name'] != ''){
        $buku_cover = $_FILES['coverbuku']['name'];

        // Query untuk mengupdate data buku beserta cover baru
        $update_query = "UPDATE tb_buku SET judul_buku='$judul_buku', deskripsi_buku='$deskripsi_buku', id_kat='$id_kat', buku_penulis='$buku_penulis', tahun_terbit='$tahun_terbit', buku_cover='$buku_cover' WHERE id='$idbuku'";
        
        if(mysqli_query($koneksi, $update_query)){
            // Unggah file cover baru
            $target_dir = "../image/"; // Ganti dengan direktori tempat Anda ingin menyimpan file
            $target_file = $target_dir . basename($_FILES['coverbuku']['name']);

            if (move_uploaded_file($_FILES['coverbuku']['tmp_name'], $target_file)) {
                header('location:buku.php');
                exit();
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
            }
        } else {
            echo "Error: " . $update_query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        // Jika tidak ada file baru yang diunggah, hanya update data buku
        $update_query = "UPDATE tb_buku SET judul_buku='$judul_buku', deskripsi_buku='$deskripsi_buku', id_kat='$id_kat', buku_penulis='$buku_penulis', tahun_terbit='$tahun_terbit' WHERE id='$idbuku'";
        
        if(mysqli_query($koneksi, $update_query)){
            header('location:buku.php');
            exit();
        } else {
            echo "Error: " . $update_query . "<br>" . mysqli_error($koneksi);
        }
    }
}

if(isset($_GET['id'])){
    $idbuku = $_GET['id'];
    $sql = "SELECT * FROM tb_buku WHERE id ='$idbuku'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle error, contoh:
        die("Error: " . mysqli_error($koneksi));
    }
}
?>

<?php include('inc/header.php') ?>


<?php include('inc/nav.php') ?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
        Edit Buku
    </div>
    <div class="card-body">
    <section id="content">
    <div class="content-blog bg-white py-3">
      <div class="container">
        <form method="post" action="editBuku.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="Judulbuku">Judul Buku</label>
            <input type="text" value="<?php echo isset($row['judul_buku']) ? $row['judul_buku'] : ''; ?>"
             class="form-control" name="judulbuku" id="Judulbuku" placeholder="JudulBuku">
          </div>
          <div class="form-group">
            <label for="Descbuku">Deskripsi Buku</label>
            <textarea 
            class="form-control" name="descbuku" rows="3"><?php echo isset($row['deskripsi_buku']) ? $row['deskripsi_buku'] : ''; ?></textarea>
          </div>
          <div class="form-group">
            <label for="Kategoribuku">Kategori Buku</label>
            <select class="form-control" id="Kategoribuku" name="kategoribuku">
            <?php
                $sql_kategori = "SELECT * FROM Kategori_buku";
                $result_kategori = mysqli_query($koneksi, $sql_kategori);

                while($kategori_row = mysqli_fetch_assoc($result_kategori)) {
                    $selected = ($kategori_row["id_kat"] == $row["id_kat"]) ? 'selected' : '';
                    echo "<option value='{$kategori_row["id_kat"]}' $selected>{$kategori_row["nama_kategori"]}</option>";
                }
            ?>
        </select>
          </div>
          <div class="form-group">
            <label for="Penulisbuku">Penulis Buku</label>
            <input type="text" value="<?php echo isset($row['buku_penulis']) ? $row['buku_penulis'] : ''; ?>" class="form-control" name="penulisbuku" id="Penulisbuku" placeholder="PenulisBuku">
          </div>
          <div class="form-group">
            <label for="Tbitbuku">Tahun Terbit</label>
            <input type="number" value="<?php echo isset($row['tahun_terbit']) ? $row['tahun_terbit'] : ''; ?>" class="form-control" name="tbitbuku" id="Tbitbuku" placeholder="Tbitbuku">
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