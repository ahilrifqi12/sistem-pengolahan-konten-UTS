<?php 
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","tokoku");


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KYNAN Motor</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">KYNAN Motor</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo date('d F Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../foto_profil/kynan.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-cube"></i>Data Sparepart</a></li>
                    <li><a href="index.php?halaman=mekanik"><i class="fa fa-user"></i>Data Mekanik</a></li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          <i class="fa fa-wrench"></i>
                          <span>Service</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="index.php?halaman=data_service">Data Service</a>
                            <a class="collapse-item" href="index.php?halaman=service">Paket Service</a>
                          </div>
                        </div>
                    </li>

                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i>Pembelian</a></li>
                    <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file"></i>Laporan</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i>Pelanggan</a></li>
                     
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) 
                {
                    if ($_GET['halaman']=="produk") {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="mekanik") {
                        include 'mekanik.php';
                    }
                    elseif ($_GET['halaman']=="service") {
                        include 'service.php';
                    }
                    elseif ($_GET['halaman']=="service") {
                        include 'service.php';
                    }
                    elseif ($_GET['halaman']=="pembelian") {
                        include 'pembelian.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan") {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman']=="detail") {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk") {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="tambahmekanik") {
                        include 'tambahmekanik.php';
                    }
                    elseif ($_GET['halaman']=="tambahservice") {
                        include 'tambahservice.php';
                    }
                    elseif ($_GET['halaman']=="hapusproduk") {
                        include 'hapusproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapusmekanik") {
                        include 'hapus_mekanik.php';
                    }
                    elseif ($_GET['halaman']=="ubahproduk") {
                        include'ubahproduk.php';
                    }
                    elseif ($_GET['halaman']=="ubahmekanik") {
                        include 'ubah_mekanik.php';
                    }
                    elseif ($_GET['halaman']=="logout") {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran") 
                    {
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="laporan_pembelian") 
                    {
                        include 'laporan_pembelian.php';
                    }
                    elseif ($_GET['halaman']=="data_service") {
                        include 'data_service.php';
                    }
                    elseif ($_GET['halaman']=="keterangan") {
                        include 'keterangan.php';
                    }
                    elseif ($_GET['halaman']=="detail_service") {
                        include 'detail_service.php';
                    }


                } else {
                    include'home.php';
                }
                
                ?>
                    
                </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
