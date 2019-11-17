<h2>Tambah Mekanik</h2>
<form method="post" enctype="multipart/form-data">
	<div class=form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>Pelatihan</label>
		<input type="text" class="form-control" name="pelatihan">
	</div>
	<div class="form-group">
		<label>Keahlian</label>
		<textarea class="form-control" name="keahlian" rows="10"></textarea>
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) 
{
	$nama=$_FILES['foto']['name'];
	$lokasi=$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_mekanik/".$nama);
	$koneksi->query("INSERT INTO mekanik 
		(nama_mekanik,foto_mekanik,pelatihan_mekanik,keahlian_mekanik)
		VALUES ('$_POST[nama]','$nama','$_POST[pelatihan]','$_POST[keahlian]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=mekanik'>";
}
 ?>
