<?php 
session_start();
//koneksi ke database
include'koneksi.php';

//jika tidak ada sesson pelanggan (belum login)
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>riwayat service</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<body>
<?php include 'menu.php'; ?>

<section class="riwayat">
	<div class="container">
		<h3>Riwayat Service <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Keluhan</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nomor=1;
				//mendapatkan id_pelanggan yg login dari session
				$id_pelanggan=$_SESSION["pelanggan"]['id_pelanggan'];
				$ambil=$koneksi->query("SELECT*FROM service_order WHERE id_pelanggan=$id_pelanggan");
				while($pecah=$ambil->fetch_assoc()){
				 ?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["tanggal_order"] ?></td>
					<td>
						<?php echo $pecah["status_service"] ?>
						<br>
						<?php if (!empty($pecah['no_transaksi'])): ?>
						Resi: <?php echo $pecah['no_transaksi']; ?>
						<?php endif ?>
					</td>
					<td><?php echo $pecah["keluhan"] ?></td>
					<td>
						<a href="work_order.php?id=<?php echo $pecah["id_order"] ?>" class="btn btn-info">Work Order</a>
						
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
</body>
</html>