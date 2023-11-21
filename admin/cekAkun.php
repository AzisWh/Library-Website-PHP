<?php
session_start();
if(isset($_SESSION['email']) && empty($_SESSION['email'])){
  header('location:login.php');
}
?>

<?php include('inc/header.php'); 
include('../config/db.php');
?>


<?php include('inc/nav.php') ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Akun Yang Terdaftar
        </div>
        <div class="card-body">
        <section id="content mt-5 ">
        <div class="content-blog bg-white">
            <div class="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    $sql = "SELECT * FROM tb_user";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
        
        <tr>
            <td><?php echo $row['nama_user']?></td>
            <td><?php echo $row["email"]; ?>"</td>   
            <td><a href='delAcc.php?user_id=<?php echo $row["user_id"] ?>'>Hapus Akun</a></td>
        </tr>

        
        <?php
        }
      } else {
        echo "0 results";
      }


?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
        </div>
    </div>
</div>

<?php include('inc/footer.php') ?>