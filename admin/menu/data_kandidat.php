<div class="container bg-white">
<?php
    if(isset($_SESSION['success'])){
        $errLog = $_SESSION['success'];
        echo '<div class="alert alert-success" id="alert-message" class="alert-warning"><div class="center"><i class="glyphicon glyphicon-remove"></i> <strong>Berasil Memanipulasi data!</strong></div>
        '.$errLog.'</div>';
        unset($_SESSION['success']);
        
    }

    
  if(isset($_SESSION['addsuccess'])){
    $errLog = $_SESSION['addsuccess'];
    echo '<div class="alert alert-success" id="alert-message" class="alert-warning"><div class="center"><i class="glyphicon glyphicon-remove"></i> <strong>Berasil mengubah data!</strong></div>
    '.$errLog.'</div>';
    unset($_SESSION['addsuccess']);
    
}
?>
<?php
if(isset($_SESSION['error'])){
    $errLog = $_SESSION['error'];
    echo '<div class="alert alert-danger" id="alert-message" class="alert-warning"><div class="center"><i class="glyphicon glyphicon-remove"></i> <strong> GAGAL!</strong></div>
    '.$errLog.'</div>';
    unset($_SESSION['error']);
    
}
    ?>
<a class="btn btn-sm btn-primary alight-right p-2 m-2" href="?menu=tambah_kandidat"> <span class="fa fa-plus"></span> Tambah Data</a>
    
<table class="table table-hover">
    <thead>
    <tr>
    <th>No.</th>
    <th class="col-md-3">Nama Kandidat</th>
    <th>Image</th>
    <th>organisasi</th>
    <th>Aksi </th>

    </tr>
    </thead>
    <?php
        $batas = 5;
        $page = isset(($_GET['hal'])) ?$_GET['hal']:1;
        
        $posisi = ($page - 1) * $batas;
        $no= 1+$posisi;
        $result = mysqli_query($dbconnect, "SELECT * FROM tbl_kandidat");
        $total = mysqli_num_rows($result);
        $pages = ceil($total/$batas);
    
    
        $q = mysqli_query($dbconnect, "SELECT * FROM tbl_kandidat LIMIT $posisi, $batas");
    while ($data_kandidat = mysqli_fetch_array($q)) {

    ?>
    <tr>
        <td><?= $no ?> </td>
        <td> <?= $data_kandidat['nama_kandidat'] ?>  </td>
        <td> <img src="../image/<?= $data_kandidat['image'] ?>" alt="<?= $data_kandidat['nama_kandidat'] ?>" srcset="" width="200" height="200">   </td>
        <td> <?= $data_kandidat['organisasi'] ?>  </td>
        <td>
        <a href="menu/hapus_kandidat.php?id=<?php echo $data_kandidat["id_kandidat"] ?>" class="btn btn-danger" onclick="return confirm('yang bener?')">Hapus</a>
		<a href="?menu=update_kandidat&id=<?php echo $data_kandidat["id_kandidat"] ?>" class="btn btn-warning">Edit</a>
	
        </td>
    </tr>

    <?php $no++; }
    ?>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        
        <?php 
            for ($i=1; $i<=$pages; $i++){
        ?>
        <li class="page-item <?php if ($i==$page){echo "active";} ?>"><a class="page-link " href="?menu=kandidat&hal=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        
     </ul>
    </nav>
</div>