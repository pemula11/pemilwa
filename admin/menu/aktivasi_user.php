<?php
session_start();
include '../../koneksi.php';
if (isset($_GET['id'])){
    $nim = ($_GET['id']);
    $sql = "UPDATE `tbl_user` SET `status` = '1' WHERE `tbl_user`.`nim` = $nim; ";
    $q = mysqli_query($dbconnect, $sql);
    $_SESSION['addsuccess'] ='berasil aktivasi nim '. $nim;
    header("location:../dashboard?menu=user");

}
else {

}

?>