<?php
  //menghubungkan koneksi database
  include "../koneksi.php";

  //memulai fungsi session
  session_start();
  if(@$_SESSION['username']==""){

      header("location:index.php");

  }
  $idkandidat = $_GET['kandidat'];
  $quser = mysqli_query($dbconnect, "SELECT * FROM tbl_kandidat WHERE id_kandidat = '$idkandidat'");
  $datakandidat = mysqli_fetch_array($quser);


include 'header.php' ?>


<!-- Section: Design Block -->
<section class="text-center">
  <!-- membuat rata tengah  -->
  <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 p-3" >
    <div class="container shadow-5-strong" style="
        
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      
      <div class="center pt-5"> 

      <img src="../image/<?= $datakandidat['image'] ?>" alt="<?= $datakandidat['nama_kandidat'] ?>" class="border m-2 rounded  border-secondary border-2" srcset="" width="200" height="200"> 
                              
            <p>Profil Kandidat </p>
            <h2><?= $datakandidat['nama_kandidat'] ?></h2>
            <p><i>"<?= $datakandidat['motto'] ?>"</i></p>
            <div class="border border-secondary border-1"></div>
            <div class="row ">
             <div class="col">
                <h3>Visi</h3>
                <ul>
                <?= $datakandidat['visi'] ?>
                </ul>
                </div>
            <div class="col">
                <h3>Misi</h3>
                <?= $datakandidat['misi'] ?>
            </div>
        </div>

        <a class="btn btn-success btn-lg m-3" href="dashboard"> Kembali </a> 
      </div>
       

      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>