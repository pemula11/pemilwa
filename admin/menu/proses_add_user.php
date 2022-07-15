<?php
session_start();
include '../../koneksi.php';
if (isset($_POST['submit'])){
   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $password =  md5($_POST['password']);

   $q = "INSERT INTO `tbl_user` (`nim`, `nama`, `password`, `status`) VALUES ('$nim', '$nama', '$password', '0');";
   $res = mysqli_query($dbconnect, $q);
   if (!$res) {
    $_SESSION['error'] = "NIM telah ada";
   } 
   else{
   $_SESSION['addsuccess'] = "Berasil tambah data!";
   }
   header("location:../dashboard?menu=tambah_user");
}


?>