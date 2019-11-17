<!-- navbar -->
<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand" href="profil.php">KYNAN</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="mekaniktmpl.php">Mekanik</a>
			</li>
			<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Service</a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		        	<?php if (isset($_SESSION["pelanggan"])): ?>
		        		<a class="dropdown-item" href="daftar_service.php">Daftar service</a>
		       			<a class="dropdown-item" href="paket_service.php">Paket service</a>
		       			<?php else: ?>
		       				<a class="dropdown-item" href="paket_service.php">Paket service</a>
		        	<?php endif ?>
		        </div>
		    </li>
			<li class="nav-item">
			<a class="nav-link" href="keranjang.php">Keranjang</a>
			</li>
		  <!-- jika login/ada session pelanggan-->
			<?php if (isset($_SESSION["pelanggan"])): ?>
				<li class="nav-item">
				<a class="nav-link" href="riwayat.php">Riwayat Belanja</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="riwayat_service.php">Riwayat Service</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
				</li>
				
				<!-- selain itu (blm login) blm ada session pelanggan--> 
				<?php else: ?>
					<li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="daftar.php">Daftar</a>
					</li>
			<?php endif ?> 
			<li class="nav-item">
			<a class="nav-link" href="checkout.php">Checkout</a>
			</li>     
		</ul>
	</div>
	<form action="pencarian.php" method="get" class="form-inline my-2 my-lg-0" >
	  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
	  <button class="btn btn-outline-info my-2 my-sm-0">Cari</button>
	</form>
	</div>
</nav>
<!-- end navbar -->