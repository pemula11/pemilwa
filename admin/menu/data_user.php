<div class="container bg-white">
    <?php
    if(isset($_SESSION['addsuccess'])){
        $errLog = $_SESSION['addsuccess'];
        echo '<div class="alert alert-success" id="alert-message" class="alert-warning"><div class="center"><i class="glyphicon glyphicon-remove"></i> <strong>Berasil Manipulasi data!</strong></div>
        '.$errLog.'</div>';
        unset($_SESSION['addsuccess']);
        
    }
    ?>
<a class="btn btn-sm btn-primary alight-right p-2 m-2" href="?menu=tambah_user"> <span class="fa fa-plus"></span> Tambah Data</a>

<table class="table table-hover">
    <thead>
    <tr>
    <th>No.</th>
    <th >Nim</th>
    <th class="col-md-3">nama</th>
    <th>status</th>
    <th class="col-md-3">Aksi</th>
    </tr>
    </thead>
    <?php
    
     include "../koneksi.php";
    $batas = 10;
    $page = isset(($_GET['hal'])) ?$_GET['hal']:1;
    
    $posisi = ($page - 1) * $batas;
    $no= 1+$posisi;
    $result = mysqli_query($dbconnect, "SELECT * FROM tbl_user");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$batas);


    $q = mysqli_query($dbconnect, "SELECT * FROM tbl_user LIMIT $posisi, $batas");
    while ($data_kandidat = mysqli_fetch_array($q)) {

    ?>
    <tr>
        <td><?= $no ?> </td>
        <td> <?= $data_kandidat['nim'] ?>  </td>
        <td> <?= $data_kandidat['nama'] ?>  </td>
        <td> <?php $status =  $data_kandidat['status'];
          
          if ($status==1){
              echo "aktif";
          } 
          else {
              echo "nonaktif";
          }
        ?>  </td>
        <td>
        <a href="menu/hapus_user.php?id=<?php echo $data_kandidat["nim"] ?>"  class="btn btn-danger" onclick="return confirm('yang bener?')">Hapus</a>
		<a href="?menu=update_user&id=<?php echo $data_kandidat["nim"] ?>" class="btn btn-warning">Edit</a>
        <?php
        if ($status==0){
          ?>  <a href="menu/aktivasi_user.php?id=<?= $data_kandidat['nim'] ?>" class="btn btn-primary">Konfirmasi</a> <?php
          } 
          else {
             ?> <a href="http://"  class="btn btn-primary disabled">Telah Aktif</a> <?php 
          }
        
	?>
        </td>
    </tr>

    <?php
    $no++; }
    ?>
    </table>

        <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        
        <?php 
            for ($i=1; $i<=$pages; $i++){
        ?>
        <li class="page-item <?php if ($i==$page){echo "active";} ?>"><a class="page-link " href="?menu=user&hal=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        
    </ul>
    </nav>
</div>


