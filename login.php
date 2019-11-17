<?php 
session_start();
include'koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login pelanggan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-tittle">Login Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-primary" name="login">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php 
//jika ada tombol login(tombol simpan di tekan)
if (isset($_POST["login"])) 
{

	$email=$_POST["email"];
	$password=$_POST["password"];
	//lakukan kuery ngecek akun di tabel pelanggan di db
	$ambil=$koneksi->query("SELECT*FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
	//ngitung akun yang terambil
	$akunyangcocok=$ambil->num_rows;

	//jika 1 akun yang cocok maka boleh dillogin kan
	if ($akunyangcocok==1) 
	{
		//anda sukses login
		//mendapatkan akun dalam bentuk array
		$akun=$ambil->fetch_assoc();
		//simpan di sesion pelanggan
		$_SESSION["pelanggan"]=$akun;
		echo "<script>alert('anda sukses login');</script>";

		//jika sudah belanja
		if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
		{
			echo "<script>location='checkout.php';</script>";
		}
		else
		{
			echo "<script>location='riwayat.php';</script>";

		}
		
	}
	else
	{
		//anda gagal login
		echo "<script>alert('anda gagal login, periksa akun Anda');</script>";
		echo "<script>location='login.php';</script>";
	}

}


 ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
</body>
</html>