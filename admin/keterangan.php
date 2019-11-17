<h2>Keterangan</h2>

<?php 
//mendapatkan id_pembelian dari url
$id_order=$_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil=$koneksi->query("SELECT*FROM keterangan WHERE id_order='$id_order'");
$detail=$ambil->fetch_assoc();


 ?>

 <div class="row">
 	<div class="col-md-6">
 		<table class="table">
 			<tr>
 				<th>Nama</th>
 				<td><?php echo $detail['nama'] ?></td>
 			</tr>
 			<tr>
 				<th>Tanggal</th>
 				<td><?php echo $detail['tanggal'] ?></td>
 			</tr>

 		</table>
 	</div>
 	<div class="col-md-6">
 		<img src="../bukti_service/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
 	</div>
 </div>


 <form method="post">
 	<div class="form-group">
 		<label>No Transaksi</label>
 		<input type="text" class="form-control" name="transaksi">
 	</div>
 	<div class="form-group">
 		<label>Status</label>
 		<select class="form-control" name="statussvc">
 			<option value="">Pilih Status</option>
 			<option value="lunas">Selesai</option>
 			<option value="barang dikirim">Booking</option>
 			<option value="batal">Batal</option>
 		</select>
 	</div>
 	<button class="btn btn-primary" name="prosessvc">Proses</button>
 </form>

 <?php 
if (isset($_POST["prosessvc"])) 
{
	$transaksi=$_POST["transaksi"];
	$status=$_POST["statussvc"];
	$koneksi->query("UPDATE service_order SET no_transaksi='$transaksi', status_service='$statussvc'
		WHERE id_order='$id_order'");

	echo "<script>alert('data service terupdate');</script>";
	echo "<script>location='index.php?halaman=dataservice';</script>";
}

 ?>