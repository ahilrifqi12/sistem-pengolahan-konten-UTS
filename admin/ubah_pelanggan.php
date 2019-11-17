<h2>Ubah Pelanggan</h2>
<?php 
$ambil=$koneksi->query("SELECT*FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Email</label>
 		<input type="email" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Telepon</label>
 		<input type="telepon" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
 	</div>
 		<div class="form-group">
 		<label>Alamat</label>
 		<input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat_pelanggan']; ?>">
 	</div>
 		<div class="form-group">
 		<label>No Plat</label>
 		<input type="text" name="plat" class="form-control" value="<?php echo $pecah['plat_nomor_pelanggan']; ?>">
 	</div>
 		<div class="form-group">
 		<label>Tipe Motor</label>
 		<input type="text" name="tipe" class="form-control" value="<?php echo $pecah['tipe_motor_pelanggan']; ?>">
 	</div>
 		<div class="form-group">
 		<label>No Rangka</label>
 		<input type="text" name="rangka" class="form-control" value="<?php echo $pecah['rangka_pelanggan']; ?>">
 	</div>
 		<div class="form-group">
 		<label>No Mesin</label>
 		<input type="text" name="mesin" class="form-control" value="<?php echo $pecah['mesin_pelanggan']; ?>">
 	</div>

 	
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>

 <?php 
if (isset($_POST['ubah'])) {
	$namapelanggan=$_FILES[['name'];
}
else
{
	$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]',plat_nomor_pelanggan='$_POST[plat]',tipe_motor_pelanggan='$_POST[tipe]',rangka_pelanggan='$_POST[rangka]',mesin_pelanggan='$_POST[mesin]' WHERE id_mesin='$_GET[id]'");


	echo "<script>alert('data pelanggan telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";


 ?>