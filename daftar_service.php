<?php 
session_start();
include'koneksi.php';
 

//jika tidak ada session pelanggan(blm login) mk dilarikan ke login.php

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>daftar service</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">

</head>
<body>
<?php include 'menu.php'; ?>
 <section class="konten">
 	<div class="container">
 		<h1>Daftar Service Online</h1>
 		<hr>
 		<table class="table table-bordered">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Nama</th>
 					<th>Telepon</th>
 					<th>Alamat</th>
 					<th>Tipe Motor</th>
 					<th>Plat Nomor</th>
 					<th>No Rangka</th>
 					<th>No Mesin</th>
 					<th>Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php $nomor=1; ?>
 				
 					<!-- menampilkan produk yg sedang di perulangkan berdasarkan id_produk -->
 				<?php 
 				$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
 				$ambil=$koneksi->query("SELECT*FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
 				$pecah=$ambil->fetch_assoc();
				?>	

 				<tr>
 					<td><?php echo $nomor; ?></td>
 					<td><?php echo $pecah["nama_pelanggan"]; ?></td>
 					<td><?php echo $pecah["telepon_pelanggan"]; ?></td>
 					<td><?php echo $pecah["alamat_pelanggan"]; ?></td>
 					<td><?php echo $pecah["tipe_motor_pelanggan"]; ?></td>
 					<td><?php echo $pecah["plat_nomor_pelanggan"]; ?></td>
 					<td><?php echo $pecah["rangka_pelanggan"]; ?></td>
 					<td><?php echo $pecah["mesin_pelanggan"]; ?></td>
 					<td>
 						<a href="hapusservice.php?id=<?php echo $id_pelanggan ?>" class="btn btn-danger btn-xs">hapus</a>
 					</td>
 				</tr>
 				<?php $nomor++; ?>
 			</tbody>
 		</table>
 		<form method="post">
 			<div class="row">
 				<div class="col-md-4">
	 				<select class="form-control" name="id_service">
	 					<option value="">Pilih paket service</option>
	 					<?php 
	 					$ambil=$koneksi->query("SELECT*FROM service");
	 					while($perservice=$ambil->fetch_assoc()){
	 					 ?>
	 					<option value="<?php echo $perservice["id_service"]?>">
	 						<?php echo $perservice['penanganan_service'] ?>-
	 						Rp. <?php echo number_format($perservice['harga_service']) ?>
	 					</option>
	 					<?php } ?>

	 				</select>
	 			</div>
 			</div>
 			<br>
 			<div class="form-group">
				<label>Keluhan</label>
				<textarea class="form-control" name="keluhan" placeholder="masukan keluhan anda"></textarea>
			</div>
			<button class="btn btn-primary" name="checkout">Checkout</button>
 		</form>

 		<?php if (isset($_POST["checkout"])) 
 		{
 			$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
 			$id_service=$_POST["id_service"];
 			$tanggal_order=date("Y-m-d");
 			$keluhan=$_POST['keluhan'];

 			$ambil=$koneksi->query("SELECT*FROM service WHERE id_service='$id_service'");
 			$arrayservice=$ambil->fetch_assoc();
 			$nama_kota=$arrayservice['penanganan_service'];

 			$koneksi->query("INSERT INTO service_order (id_pelanggan,id_service,tanggal_order,keluhan,penanganan_service)VALUES ('$id_pelanggan','$id_service','$tanggal_service','$keluhan','$penanganan_service')");

 			echo "<script>alert('proses sukses');</script>";
 			echo "<script>location='work_order.php?id=$id_pelanggan';</script>";
 		} ?>

 		

 		

 				
 		
 	</div>
 </section>
 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>