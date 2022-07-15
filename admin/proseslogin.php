<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($dbconnect,"select * from tbl_admin where username='$username' and password=md5('$password')");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){
	//$_SESSION['username'] = $username;
	
@$_SESSION['useradmin'] = $username;
	$data = mysqli_fetch_assoc($login);
    @$_SESSION['idadmin'] = $data['id_admin'];
	 // cek jika user login sebagai admi
	@$_SESSION['level'] = $data["hak_akses"];
		// alihkan ke halaman dashboard pengurus
		header("location:dashboard.php");
	   


}else{
	$_SESSION['eror'] = "username/password salah!";
		$_SESSION['error'] = "username/password salah!";
		// alihkan ke halaman login kembali
	header("location:login.php");
		
}

?>