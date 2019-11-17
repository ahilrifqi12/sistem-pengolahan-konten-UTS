<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>daftar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<?php include 'menu.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="email" class="form-control" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea class="form-control" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Telp/HP</label>
								<div class="col-md-7">
									<input type="telepon" class="form-control" name="telepon" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Plat Nomor</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="plat" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Tipe Motor</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="tipe" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No. Rangka</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="rangka" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No. Mesin</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="mesin" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>
						</form>
						<?php 
						//jika ada tombol daftar(ditekan tombol daftar)
						if (isset($_POST["daftar"])) 
						{
							//mengambil isian nama,email,password,alamat,telepon.
							$nama=$_POST["nama"];
							$email=$_POST["email"];
							$password=$_POST["password"];
							$alamat=$_POST["alamat"];
							$telepon=$_POST["telepon"];
							$plat=$_POST["plat"];
							$tipe=$_POST["tipe"];
							$rangka=$_POST["rangka"];
							$mesin=$_POST["mesin"];

							//cek apakah email sudah digunakan
							$ambil=$koneksi->query("SELECT*FROM pelanggan WHERE email_pelanggan='$email'");
							$yangcocok=$ambil->num_rows;
							if ($yangcocok==1) 
							{
								echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
								echo "<script>location='daftar.php';</script>";
							}
							else
							{
								//query insert ke tabel pelanggan
								$koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan,plat_nomor_pelanggan,tipe_motor_pelanggan,rangka_pelanggan,mesin_pelanggan) 
								VALUES ('$email','$password','$nama','$telepon','$alamat','$plat','$tipe','$rangka','$mesin')");

								echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
								echo "<script>location='login.php';</script>";
							}


						}

						 ?>
					</div>
				</div>		
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
</body>
</html>