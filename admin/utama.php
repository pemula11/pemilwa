<?php

session_start();
include '../../koneksi.php';

if (isset($_POST['submit'])){

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $motto = $_POST['motto'];
    $organisasi = $_POST['organisasi'];

	$uploadDir = "../../image/";
	// Apabila ada file yang di-upload
    if (isset($_FILES['foto'])){
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $uploadFile = $_FILES['foto'];
    
            // Extract nama file
            $extractFile = pathinfo($uploadFile['name']);
            $size = $_FILES['foto']['size']; //untuk mengetahui ukuran file
            $tipe = $_FILES['foto']['type'];// untuk mengetahui tipe file
    
            //Dibawah ini adalah untuk mengatur format gambar yang dapat di uplada ke server.
            
            $exts =array('image/jpg','image/jpeg','image/pjpeg','image/png','image/x-png');
            if(!in_array(($tipe),$exts)){
                $_SESSION['error'] = 'Format file yang di izinkan hanya JPEG dan PNG';
                header("location:../dashboard?menu=tambah_kandidat");
                exit;
            }
            // dibawah ini script untuk mengatur ukuran file yang dapat di upload ke server
            if(($size !=0)&&($size>300000)){
                $_SESSION['error'] = 'Ukuran gambar terlalu besar?';
                header("location:../dashboard?menu=tambah_kandidat");
                exit;
            }

            $sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
            $handle = opendir($uploadDir);
            while(false !== ($file = readdir($handle))){ // Looping isi file pada directory tujuan
                // Apabila ada file dengan awalan yg sama dengan nama file di uplaod
                if(strpos($file,$extractFile['filename']) !== false)
                $sameName++; // Tambah data file yang sama
            }
        }
    
       





        
	/* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai 
	* nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
	$newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];
    

  
   $foto = $newName;


   if(move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$newName)){
		echo 'File berhasil diupload dengan nama: '.$newName;
        $q = "UPDATE `tbl_kandidat` SET `nama_kandidat` = '$nama',`image`='$foto',`visi` ='$visi',`misi`='$misi',`motto`='$motto', `organisasi` ='$organisasi' WHERE `tbl_kandidat`.`id_kandidat` = $id; ";
	}
	else{
		$_SESSION['error'] = 'tidak ada File  diupload' .$newName;
        $q = "UPDATE `tbl_kandidat` SET `nama_kandidat` = '$nama', `visi` = '$visi', `misi` = '$misi', `motto` = '$motto', `organisasi` = '$organisasi' WHERE `tbl_kandidat`.`id_kandidat` = $id; ";
	}
 //  $qa = "INSERT INTO `tbl_kandidat` (`id_kandidat`, `nama_kandidat`, `image`, `visi`, `misi`, `motto`, `organisasi`) VALUES (NULL, '$nama', '$foto', '$visi', '$misi', '$motto', '$organisasi');";
    
    }
	
else{
    $q = "UPDATE `tbl_kandidat` SET `nama_kandidat` = '$nama', `visi` = '$visi', `misi` = '$misi', `motto` = '$motto', `organisasi` = '$organisasi' WHERE `tbl_kandidat`.`id_kandidat` = $id; ";
}

   
   $res = mysqli_query($dbconnect, $q);
   if (!$res) {
    $_SESSION['error'] = "Ada yang SALAH";
   } 
   else{
   $_SESSION['addsuccess'] = "Berasil update data!";
   }

   

   header("location:../dashboard?menu=kandidat");




}
?>