<?php session_start(); ?>
<?php include'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>work order</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">



	<!-- nota disini copas saja dari nota yang ada di admin -->
	<h2>Work Order</h2>
<?php 

$ambil = $koneksi->query("SELECT*FROM service_order JOIN pelanggan ON service_order.id_pelanggan=pelanggan.id_pelanggan WHERE service_order.id_order='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!-- jika pelanggan yang beli tidak sama dengan pelanggan yg login, maka dilarikan ke riwayat.php karena dia tidak berhak melihat nota orang lain-->
<!-- pelanggan yg beli harus pelanggan yg login -->

<div class="row">
	<div class="col-md-4">
		<h3>Service</h3>
		<strong>No. Service: <?php echo $detail['id_order']; ?></strong> <br>
		Tanggal: <?php echo $detail['tanggal_order']; ?><br>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<p>
			<?php echo $detail['telepon_pelanggan'];?> <br>
			<?php echo $detail['email_pelanggan']; ?><br>
			<?php echo $detail['alamat_pelanggan']; ?>

		</p>
	</div>
	<div class="col-md-4">
		<h3>Identitas Kendaraan</h3>
		<strong><?php echo $detail['plat_nomor_pelanggan']; ?></strong><br>
		<p>
			<?php echo $detail['tipe_motor_pelanggan']; ?><br>
			<?php echo $detail['rangka_pelanggan']; ?><br>
			<?php echo $detail['mesin_pelanggan']; ?>
		</p>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Penanganan</th>
			<th>Harga</th>
			<th>Keluhan</th>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT*FROM service_order JOIN service ON service_order.id_service=service.id_service WHERE service_order.id_order");
		$pecah = $ambil->fetch_assoc();?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['penanganan_service']; ?></td>
			<td>Rp. <?php echo number_format($pecah ['harga_service']); ?></td>
			<td><?php echo $pecah ['keluhan']; ?></td>
			
			
		</tr>
		<?php $nomor++; ?>
	</tbody>
</table>


<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				<strong>Silahkan datang ke KYNAN Motor maksimal 1 jam Setelah Pendaftaran online</strong>
			</p>
		</div>
	</div>
</div>
		
	</div>
</section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
</body>
</html>