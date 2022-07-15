<?php

if (isset($_GET['id'])){
$con = mysqli_connect("localhost", "root", "", "db_pemilwa");
echo mysqli_error($con);

$id = $_GET["id"];

$query = "DELETE FROM `tbl_kandidat` WHERE id_kandidat='$id' ";
mysqli_query($con, $query);
$_SESSION['success'] = "Berasil Hapus data ID ". $id;
header("location:../dashboard?menu=kandidat");

}
?>