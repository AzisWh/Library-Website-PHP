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
                            <th>Prodi</th>
                            <th>Mobile</th>
                            <th>Nim</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    if(isset($_GET['user_id'])){
        $iduser = $_GET['user_id'];
        $sql = "SELECT * FROM user_data WHERE userid ='$iduser'";
        $result = mysqli_query($koneksi, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else {
            // Handle error, contoh:
            die("Error: " . mysqli_error($koneksi));
        }
    
    }

            ?>
        
        <tr>
            <td><?php echo $row['namadepan']?> <?php echo $row['namabelakang']?></td>
            <td><?php echo $row["prodi"]; ?></td>   
            <td><?php echo $row["mobile"]; ?></td>   
            <td><?php echo $row["NIM"]; ?></td>   
            <td><button onclick="printPage()" class="btn btn-primary">Print Kartu</button></td>
            
        
        </tr>

        
        <?php


?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
        </div>
    </div>
</div>

<script>
    function printPage() {
        window.print();
    }
</script>

<?php include('inc/footer.php') ?>