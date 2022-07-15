
<?php include 'header.php' ?>
 
 <?php
 //menghubungkan koneksi database
 include "../koneksi.php";

 //memulai fungsi session
 session_start();
 if(@$_SESSION['useradmin']==""){

     header("location:index.php");

 }
         @$menu = $_GET['menu'];
          $nama = @$_SESSION['useradmin'];
 ?>  
 <div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
       <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="index3.html" class="nav-link">Home</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link">Contact</a>
       </li>
     
     </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"> Logout</a>
      </li>
    </ul>
   </nav>
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
       <img src="../image/static/logo_pemilwa.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <span class="brand-text font-weight-light">Pemilwa</span>
     </a>
 
     <!-- Sidebar -->
     <div class="sidebar">
       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
           <img src="../image/static/chat.png" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
           <a href="#" class="d-block"><?= $nama ?> </a>
           
         </div>
       </div>
 
       <!-- SidebarSearch Form -->
       
 
       <!-- Sidebar Menu -->
       <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
           <li class="nav-item ">
             <a href="?menu=dashboard" class="nav-link <?php if($menu=="dashboard"){ echo "active"; } ?>">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 Dashboard
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
            
           </li>
 
           <li class="nav-item">
             <a href="?menu=kandidat" class="nav-link <?php if($menu=="kandidat"){ echo "active"; } ?>">
               <i class="nav-icon fas fa-user-graduate"></i>
               <p>
                 Kandidat
                 
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="?menu=user" class="nav-link <?php if($menu=="user"){ echo "active"; } ?>">
               <i class="nav-icon fas fa-user"></i>
               <p>
                 Data User
                 
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="?menu=laporan" class="nav-link <?php if($menu=="laporan"){ echo "active"; } ?>">
               <i class="nav-icon fa fa-file"></i>
               <i class="fa-regular fa-file-chart-column"></i>
               <p>
                 Laporan
                 
               </p>
             </a>
           </li>
         </ul>
       </nav>
       <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
   </aside>
 
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1 class="m-0">Menu <?= $menu ?></h1>
           </div><!-- /.col -->
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active"> <?= $menu ?> </li>
             </ol>
           </div><!-- /.col -->
         </div><!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <?php
         if (isset($_GET['menu'])) {
             switch(($_GET['menu'])) {
                 case '':
                   include 'menu/dashboard.php';
                     break;
                 case 'kandidat':
                      include 'menu/data_kandidat.php';
                     break;
                 case 'user':
                   include 'menu/data_user.php';
                     break;
                 case 'laporan':
                  include 'menu/laporan.php';
                     break;
                 case 'tambah_user':
                      include 'menu/tambah_user.php';
                     break;
                case 'tambah_kandidat':
                      include 'menu/tambah_kandidat.php';
                     break;
                case 'update_kandidat':
                      include 'menu/update_kandidat.php';
                     break;
                case 'update_user':
                      include 'menu/update_user.php';
                     break;
                case 'hapus_kandidat':
                      include 'menu/hapus_kandidat.php';
                     break;
                case 'hapus_user':
                      include 'menu/hapus_user.php';
                     break;
                 default:
                 include 'menu/dashboard.php';
                   break;
             }
            }
            else{
              include 'menu/dashboard.php';
            }
            
         ?>
 
 
         <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 
   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->
 
   <!-- Main Footer -->
   <footer class="main-footer">
     <strong>Copyright &copy;  UINWS </strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
    
     </div>
   </footer>
 </div>
 <!-- ./wrapper -->
 
 
 
 <?php include 'footer.php' ?>
 