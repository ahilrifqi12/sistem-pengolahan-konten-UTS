<?php 
session_start();
$id_pelanggan=$_GET['id'];
unset($_SESSION["daftar"][$id_pelanggan]);

echo "<script>alert('daftar service telah dihapus');</script>";
echo "<script>location='home.php';</script>";
 ?>