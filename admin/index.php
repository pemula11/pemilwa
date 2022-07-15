<!DOCTYPE html>
<html lang="en">

<?php $base = "http://localhost:8080/pemilwa"; ?> 
<style>
.bg {
	background: rgb(21,121,9);
background: linear-gradient(283deg, rgba(21,121,9,1) 2%, rgba(236,255,0,1) 97%);
}

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
	<link rel="stylesheet" href="<?= $base ?>/asset/css/bootstrap.css" />
	<link rel="stylesheet" href="<?= $base; ?>/asset/css/bootstrap.bundle.css" />
</head>

<body class="bg">


<!-- Section: Design Block -->
<section class="text-center">
  <!-- membuat rata tengah  -->
  <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 p-3" >
    <div class="container shadow-5-strong" style="
        
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
      
      <div class="center pt-5"> 
        <img src="<?= $base; ?>/image/static/logo_pemilwa.png" class="img-fluid p-3" style="width: 150px" alt="" srcset="">
        <h1 style="font-size:300%">Menu Admin </h1>
        <h1 style="font-size:400%">Pemilwa UIN Walisongo </h1>
        
        <div class=" p-5 center">
        
             <a class="btn btn-primary btn-lg " href="login.php"> Masuk </a> 
            
        </div>

      </div>


      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->



	<!-- Jquery dan Bootsrap JS -->
	<script src="../asset/js/jquery.min.js"></script>
	<script src="../asset/js/bootstrap.min.js"></script>
	<script src="../asset/js/bootstrap.bundel.js"></script>

</body>

</html>