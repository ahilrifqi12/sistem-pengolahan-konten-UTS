<h2>Tambah Service</h2>
<form method="post" enctype="multipart/form-data">
	<div class=form-group">
		<label>Pelayanan</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea class="form-control" name="keterangan" rows="10"></textarea>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) 
{
	$koneksi->query("INSERT INTO service 
		(penanganan_service,harga_service,keterangan_service)
		VALUES ('$_POST[nama]','$_POST[harga]','$_POST[keterangan]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=service'>";
}
 ?>
