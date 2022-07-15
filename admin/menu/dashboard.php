<div class="container bg-white">

<?php
$golput = 0;
$memilih = 0;
$jumlah=0;
$sql = "SELECT tbl_pilihan.id_kandidat, tbl_user.nim, tbl_kandidat.nama_kandidat, tbl_kandidat.organisasi FROM `tbl_pilihan` RIGHT JOIN tbl_user ON tbl_user.nim = tbl_pilihan.nim Left JOIN tbl_kandidat on tbl_kandidat.id_kandidat = tbl_pilihan.id_kandidat WHERE tbl_kandidat.organisasi= 'hmj'";
$conn = mysqli_query($dbconnect, $sql);
$thmj = mysqli_num_rows($conn);

$sql = "SELECT tbl_pilihan.id_kandidat, tbl_user.nim, tbl_kandidat.nama_kandidat, tbl_kandidat.organisasi FROM `tbl_pilihan` RIGHT JOIN tbl_user ON tbl_user.nim = tbl_pilihan.nim Left JOIN tbl_kandidat on tbl_kandidat.id_kandidat = tbl_pilihan.id_kandidat WHERE tbl_kandidat.organisasi= 'dema'";
$conn = mysqli_query($dbconnect, $sql);
$tdema = mysqli_num_rows($conn);

$sql = "SELECT tbl_pilihan.id_kandidat, tbl_user.nim, tbl_kandidat.nama_kandidat, tbl_kandidat.organisasi FROM `tbl_pilihan` RIGHT JOIN tbl_user ON tbl_user.nim = tbl_pilihan.nim Left JOIN tbl_kandidat on tbl_kandidat.id_kandidat = tbl_pilihan.id_kandidat WHERE tbl_kandidat.organisasi= 'sema'";
$conn = mysqli_query($dbconnect, $sql);
$tsema = mysqli_num_rows($conn);


  $totaluser = "SELECT * FROM tbl_user";
  $conn_total = mysqli_query($dbconnect, $totaluser);
  $tuser = mysqli_num_rows($conn_total);

$sqlkandidat = "SELECT id_kandidat FROM tbl_kandidat";
$connkandidat = mysqli_query($dbconnect, $sqlkandidat);
$cekkandidat = mysqli_num_rows($connkandidat);
?>


<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $cekkandidat ?></h3>

                <p>Kandidat Yang Ada</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?menu=kandidat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= round(($thmj/$tuser*100), 2) ?><sup style="font-size: 20px">%</sup></h3>

                <p><?= $thmj ?> User Telah Memilih HMJ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= round(($tdema/$tuser*100), 2) ?><sup style="font-size: 20px">%</sup></h3>

                <p><?= $tdema ?> User Telah Memilih DEMA</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= round(($tsema/$tuser*100), 2) ?><sup style="font-size: 20px">%</sup></h3>

                <p><?= $tsema ?> User Telah Memilih SEMA</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $tuser ?></h3>

                <p>User Yang Telah Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?menu=user" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        

          
          <!-- ./col -->
        </div>
        <!-- /.row -->

</div>
