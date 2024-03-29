<?php 
session_start();
//koneksi ke database
include'koneksi.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Service</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>
<section class="konten">
	<div class="container">
		<h1>Service</h1>

		<div class="row">

			<?php $ambil=$koneksi->query("SELECT*FROM service"); ?>
			<?php while($perservice=$ambil->fetch_assoc()){ ?>
			<div class="col-md-4">
				<div class="thumbnail">
					<div class="caption">
						<h3><?php echo $perservice['penanganan_service']; ?></h3>
						<h5>Rp. <?php echo number_format($perservice['harga_service']); ?></h5>
						<p><?php echo $perservice['keterangan_service']; ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
</body>
</html>