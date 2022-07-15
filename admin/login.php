<!DOCTYPE html>
<html lang="en">

<?php $base = "localhost:8080/pemilwa"; 
include '../koneksi.php';
session_start();
if (@$_SESSION['useradmin'] != ""){
  header("location:dashboard.php");
  
}

?> 
<style>

html, body, .container, .row {
   height: 100%;
  }



</style>

<style type="text/css">   
  
 </style>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Pemilwa - Menu Utama</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../asset/css/bootstrap.css" />
	<link rel="stylesheet" href="../asset/css/bootstrap.bundle.css" />
</head>

<body class="bg">




<!-- Section: Design Block -->
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 3% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: rgb(141,194,111);
  background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>


<section class="text-center">
  <!-- membuat rata tengah  -->
 
      

    <div class="login-page">
    

    <div class="form">

    <div class="p-2"> 
    <h2 class="center">Pemilwa UIN Walisongo </h2>

          <img src="../image/static/logo_uin.png" class="img-fluid p-3" style="width: 120px" alt="" srcset="">
          
  </div>
    <h2>Login</h2>
    <?php
    if(isset($_SESSION['error'])){
                                      $errLog = $_SESSION['error'];
                                      echo '<div class="alert alert-danger" id="alert-message" class="alert-warning"><div class="center"><i class="glyphicon glyphicon-remove"></i> <strong>LOGIN GAGAL!</strong></div>
                                      '.$errLog.'</div>';
                                      unset($_SESSION['error']);
                                      
                                  }
                                  echo @$_SESSION['idadmin']; ?>
      <form action="proseslogin.php" method="post" class="login-form">
        <input type="text" name="username" placeholder="NIM"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="submit" class="submit" value="login" name="login">
        
      </form>
    </div>


</section>
<!-- Section: Design Block -->



	<!-- Jquery dan Bootsrap JS -->
	<script src="../asset/js/jquery.min.js"></script>
	<script src="../asset/js/bootstrap.min.js"></script>
	<script src="../asset/js/bootstrap.bundel.js"></script>

</body>

</html>