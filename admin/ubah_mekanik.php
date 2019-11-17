<h2>Ubah Mekanik</h2>
<?php 
$ambil=$koneksi->query("SELECT*FROM mekanik WHERE id_mekanik='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama Mekanik</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_mekanik']; ?>">
 	</div>
 	<div class="form-group">
 		<img src="../foto_mekanik/<?php echo $pecah['foto_mekanik'] ?>" width="100">
 	</div>
 	<div class="form-group">
 		<label>Ganti Foto</label>
 		<input type="file" name="foto" class="form-control">
 	</div>
 	<div class="form-group">
 		<label>Pelatihan Mekanik</label>
 		<input type="text" name="pelatihan" class="form-control" value="<?php echo $pecah['pelatihan_mekanik']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Keahlian Mekanik</label>
 		<textarea name="keahlian" class="form-control" rows="10"><?php echo $pecah['keahlian_mekanik']; ?></textarea>
 	</div>
 	
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>

 <?php 
if (isset($_POST['ubah'])) {
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	//jika foto diubah
	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../foto_mekanik/$namafoto");
		$koneksi->query("UPDATE mekanik SET nama_mekanik='$_POST[nama]',foto_mekanik='$namafoto',pelatihan_mekanik='$_POST[pelatihan]',keahlian_mekanik='$POST[keahlian]' WHERE id_mekanik='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE mekanik SET nama_mekanik='$_POST[nama]',pelatihan_mekanik='$_POST[pelatihan]',keahlian_mekanik='$_POST[keahlian]' WHERE id_mekanik='$_GET[id]'");
	}
	echo "<script>alert('data mekanik telah diubah');</script>";
	echo "<script>location='index.php?halaman=mekanik';</script>";
}

 ?>