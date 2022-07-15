<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$nim = $_POST['nim'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($dbconnect,"select * from tbl_user where nim='$nim' and password=md5('$password')");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
	

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin

	if ($data['status']==1) {
		# code...
	
		$_SESSION['username'] = $nim;
	// cek jika user login sebagai pengurus
		// buat session login dan username
		 @$_SESSION['iduser'] = $data['nim'];
		
		@$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard pengurus
		header("location:dashboard");
		//echo $data['status'];
	}

else if ($data['status']==0) {
	# code...
	$_SESSION['eror'] = "username belum aktif!";
		$_SESSION['error'] = "username belum aktif!";
		
		// alihkan ke halaman login kembali
		header("location:login.php");
}



}else{
	$_SESSION['eror'] = "username/password salah!";
		$_SESSION['error'] = "username/password salah!";
		// alihkan ke halaman login kembali
	header("location:login.php");
		
}

?>