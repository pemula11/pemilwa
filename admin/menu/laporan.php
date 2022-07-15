<div class="container bg-white">
<?php
                     $pil = 'hmj';
                     if (isset($_GET['pil'])){
                         $pil = ($_GET['pil']);
                        // echo $pil;
                     }
              ?>
              <div class="text-white">
                <a href="?menu=laporan&pil=hmj" class="btn  <?php echo $pil=='hmj' ?  "btn-primary" : "btn-success"  ?>">HMJ</a>
                <a href="?menu=laporan&pil=dema" class="btn <?php echo $pil=='dema' ?  "btn-primary" : "btn-success"  ?>">DEMA</a>
                <a href="?menu=laporan&pil=sema" class="btn <?php echo $pil=='sema' ?  "btn-primary" : "btn-success"  ?>">SEMA</a>
              </div>

<?php
    $arrhitung= [];
    $golput = 0;
    $memilih = 0;
    $jumlah=0;
    $urutan = [];
    $sqlkandidat = "SELECT * FROM tbl_kandidat WHERE organisasi = '$pil'";
    $connkandidat = mysqli_query($dbconnect, $sqlkandidat);
    $daftar_kandidat = "";
    $daftar_perolehan =[];
    $hasil = '';


    $totaluser = "SELECT * FROM tbl_user";
    $conn_total = mysqli_query($dbconnect, $totaluser);
    $tuser = mysqli_num_rows($conn_total);

    $sql = "SELECT tbl_pilihan.id_kandidat, tbl_user.nim, tbl_kandidat.nama_kandidat, tbl_kandidat.organisasi 
            FROM `tbl_pilihan` RIGHT JOIN tbl_user ON tbl_user.nim = tbl_pilihan.nim 
            Left JOIN tbl_kandidat on tbl_kandidat.id_kandidat = tbl_pilihan.id_kandidat 
           ;";
    $conn = mysqli_query($dbconnect, $sql);
    while ($data = mysqli_fetch_array($conn)) {
        $c = $data['id_kandidat'];
        $jumlah++;
        if ($c == NULL) {
    
        $golput++;    }
        else {
           
            array_push($arrhitung,  $data['id_kandidat']);
        }
    }


    
    
    ?>
    <canvas id="myChart"></canvas>
    <table class="table table-hover">
    <thead>
    <tr>
    <th>No.</th>
    <th>Nama kandidat.</th>
    <th>perolehan suara.</th>
    </tr>
    <?php $no = 1;
    while($kan= mysqli_fetch_array($connkandidat)){ 
        $namakan = $kan['nama_kandidat'];
        
        $daftar_kandidat .= "'$namakan'". ", ";
        array_push($arrhitung,  $kan['id_kandidat']);
        array_push($urutan, $kan['id_kandidat']);
        $arrcount = array_count_values($arrhitung);
       // array_push($daftar_perolehan, [$kan['nama_kandidat'] => ( $arrcount[$kan['id_kandidat']])-1 ]) ;
        ?>
        
    <tr>
        <td><?=$no ?></td>
        <td><?= $kan['nama_kandidat']?> </td>
        <td><?=( $arrcount[$kan['id_kandidat']])-1?></td>
    </tr>
    <?php $no++;}
    // print_r(array_count_values($arrhitung));
  
    $total = 0;
    for($i=0; $i < count($urutan); $i++) {
       $total += $arrcount[$urutan[$i]] -1;}  ?>
    <tr>
        <td>  </td>
        <td> Belum Memilih </td>
        <td> <?= $tuser-$total ?> </td>
    </tr>
    <tr>
        <td>  </td>
        <td> <b> TOTAL </b> </td>
        <td> <b> <?= $tuser ?> </b> </td>
    </tr>
    </table>
   
   
</div>

<script src="../asset/js/charts.js"></script>
<script src="../asset/js/pallete.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: [<?= $daftar_kandidat ?>],
            datasets: [{
                label:'Data Mahasiswa',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(15, 200, 15)', 'rgb(255, 255, 132)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [  <?php for($i=0; $i < count($urutan); $i++) {
        echo ($arrcount[$urutan[$i]]-1).',';}  ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>