<?php

if (isset($_GET['id'])){
$con = mysqli_connect("localhost", "root", "", "db_pemilwa");
echo mysqli_error($con);

$id = $_GET["id"];

$query = "DELETE FROM `tbl_user` WHERE nim='$id' ";
mysqli_query($con, $query);
$_SESSION['addsuccess'] = "Berasil Hapus data ID ". $id;

header("location:../dashboard?menu=user");

}
?>