<?php
    //menghubungkan koneksi database
    include "../koneksi.php";

    //memulai fungsi session
    session_start();
    if(@$_SESSION['username']==""){

        header("location:index.php");

    }
    $nim = @$_SESSION['username'];
    $quser = mysqli_query($dbconnect, "SELECT * FROM tbl_user WHERE nim = '$nim'");
    $datauser = mysqli_fetch_array($quser);
	
	
?>

<?php include 'header.php' ?>


<!-- Section: Design Block -->
<section class="text-center">
  <!-- membuat rata tengah  -->
    <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 p-3" >
      <div class="container shadow-5-strong" style="
        
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      
            <div class="clearfix p-2">
                <div class="float-start border-3 border-secondary border-bottom p-2"><b>Selamat Datang,<?= $datauser['nama'] ?></b></div>
    
            </div>

        <!-- start Containe -->
        
            <div class="p-3 mt-4">
              <?php
                     $pil = 'hmj';
                     if (isset($_GET['pil'])){
                         $pil = ($_GET['pil']);
                        // echo $pil;
                     }
              ?>
                <a href="?pil=hmj" class="btn <?php echo $pil=='hmj' ?  "btn-primary" : "btn-success"  ?>">HMJ</a>
                <a href="?pil=dema" class="btn <?php echo $pil=='dema' ?  "btn-primary" : "btn-success"  ?>">DEMA</a>
                <a href="?pil=sema" class="btn <?php echo $pil=='sema' ?  "btn-primary" : "btn-success"  ?>">SEMA</a>
                <h2> Daftar Kandidat <?= $pil ?> </h2>
                <!-- query untuk mendapat data apakah sudah memilih -->
                <?php 
               
                 $sql = mysqli_query($dbconnect, "SELECT * FROM `tbl_pilihan` INNER JOIN tbl_kandidat ON tbl_pilihan.`id_kandidat` = tbl_kandidat.id_kandidat WHERE `nim`= '$nim' AND  tbl_kandidat.organisasi = '$pil'");
                        
                 $cek = mysqli_num_rows($sql);
                 //jika user belum melalukan pemilihan
                 if( $cek < 1) {

                    $q = mysqli_query($dbconnect, " SELECT * FROM `tbl_kandidat` WHERE organisasi = '$pil' ");
                    //cek data kandidat
                    $cekkandidat = mysqli_num_rows($q);
                    if ($cekkandidat > 0) {
                ?>
    
                <form method="post">
                
                    <div class="row">
                    <?php
                       //loop data kandidat pada database
                        while ($dkandidat = mysqli_fetch_array($q)) {

                    ?>
                        <div class="col m-2">
                             <div class="container col-12 rounded bg-white text-dark"> 
                                
                                <img src="../image/<?= $dkandidat['image'] ?>" alt="<?= $dkandidat['nama_kandidat'] ?>" class="border m-1 rounded  border-secondary border-2" srcset="" width="150" height="150"> 
                                <div class=""> <?= $dkandidat['nama_kandidat'] ?></div>
                                <a href="profil?kandidat=<?= $dkandidat['id_kandidat'] ?>" class="btn btn-success"> Profil </a> <br>
                                <input class="form-check-input" type="radio" name="pilvote" value="<?= $dkandidat['id_kandidat'] ?>" id="2">
                            </div>
                        </div>

                        <?php
                        }       
                        ?>
                        
                    </div>
                    
                    <input type="submit" name="vote" value="VOTE" class="btn btn-success mt-4 p-3">
                </form>
                    <?php } 
                        else {
                            echo "SAAT INI SEDANG TIDAK ADA PEMILIHAN";
                        }

                    } else{
                        echo "ANDA TELAH MELALUKAN PEMILIHAN ". $pil ;
                        echo '<br><a href="proseslogout.php" class="btn btn-danger">LOGOUT</a>';
                    } ?>
                    
            </div>
         <!-- End Containe -->
       </div>
    </div>
</section>
<!-- Section: Design Block -->


<?php

if (isset($_POST['vote'])){
    $idvote = $_POST['pilvote'];
    
    $sql = "INSERT INTO tbl_pilihan (id_pil, id_kandidat, nim) VALUES (NULL, '$idvote', '$nim')"; 

        
    mysqli_query($dbconnect, $sql);
    ?>
    <script type="text/javascript">
    alert('berhasil melakukan vote');
   
    </script>



<?php
echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=dashboard.php\"/>";
} 
// SELECT * FROM `tbl_pilihan` INNER JOIN tbl_kandidat ON tbl_pilihan.`id_kandidat` = tbl_kandidat.id_kandidat
// SELECT tbl_pilihan.id_kandidat, tbl_user.nim FROM `tbl_pilihan` RIGHT JOIN tbl_user ON tbl_user.nim = tbl_pilihan.nim; 
// SELECT tbl_pilihan.id_kandidat, tbl_user.nim, tbl_kandidat.organisasi FROM `tbl_pilihan` RIGHT JOIN tbl_user ON tbl_user.nim = tbl_pilihan.nim INNER JOIN tbl_kandidat WHERE tbl_kandidat.id_kandidat = tbl_pilihan.id_kandidat; 
// SELECT tbl_pilihan.id_kandidat, tbl_user.nim, tbl_kandidat.organisasi FROM `tbl_pilihan` RIGHT JOIN tbl_user ON tbl_user.nim = tbl_pilihan.nim Left JOIN tbl_kandidat on tbl_kandidat.id_kandidat = tbl_pilihan.id_kandidat; 
?>

<?php include 'footer.php' ?>