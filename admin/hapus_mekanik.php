<?php 

$ambil=$koneksi->query("SELECT*FROM mekanik WHERE id_mekanik='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotomekanik=$pecah['foto_mekanik'];
if (file_exists("../foto_mekanik/$fotomekanik")) {
	unlink("../foto_mekanik/$fotomekanik");
}

$koneksi->query("DELETE FROM mekanik WHERE id_mekanik='$_GET[id]'");

echo "<script>alert('mekanik terhapus');</script>";
echo "<script>location='index.php?halaman=mekanik';</script>";
 ?>