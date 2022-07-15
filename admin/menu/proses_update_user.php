<?php

session_start();
include '../../koneksi.php';

if (isset($_POST['submit'])){

    $id = $_POST['nim'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);

    $q = "UPDATE `tbl_user` SET `nama` = '$nama', `password` = '$password' WHERE `tbl_user`.`nim` = $id";
    
   $res = mysqli_query($dbconnect, $q);
   if (!$res) {
    $_SESSION['error'] = "Ada yang SALAH";
   } 
   else{
   $_SESSION['addsuccess'] = "Berasil update data!";
   }

   

   header("location:../dashboard?menu=user");
 } ?>