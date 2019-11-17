<?php 
session_start();


include'koneksi.php';

 if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
 {
 	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
 	echo "<script>location='home.php';</script>";
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Keranjang belanja</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>
<?php include 'menu.php'; ?>
 <section class="konten">
 	<div class="container">
 		<h1>Keranjang Belanja</h1>
 		<hr>
 		<table class="table table-bordered">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Produk</th>
 					<th>Harga</th>
 					<th>Jumlah</th>
 					<th>Subharga</th>
 					<th>Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php $nomor=1; ?>
 				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
 					<!-- menampilkan produk yg sedang di perulangkan berdasarkan id_produk -->
 				<?php 
 				$ambil=$koneksi->query("SELECT*FROM produk WHERE id_produk='$id_produk'");
 				$pecah=$ambil->fetch_assoc();
 				$subharga=$pecah["harga_produk"]*$jumlah; 
				?>	

 				<tr>
 					<td><?php echo $nomor; ?></td>
 					<td><?php echo $pecah["nama_produk"]; ?></td>
 					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
 					<td><?php echo $jumlah; ?></td>
 					<td>Rp. <?php echo number_format($subharga); ?></td>
 					<td>
 						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a>
 					</td>
 				</tr>
 				<?php $nomor++; ?>
 				<?php endforeach ?>
 			</tbody>
 		</table>

 		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
 		<a href="checkout.php" class="btn btn-primary">Checkout</a>
 		
 	</div>
 </section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
 </body>
 </html>