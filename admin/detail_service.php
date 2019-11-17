<h2>Detail Service</h2>
<?php 
$ambil = $koneksi->query("SELECT*FROM service_order JOIN pelanggan ON service_order.id_pelanggan=pelanggan.id_pelanggan WHERE service_order.id_order='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>


<div class="row">
	<div class="col-md-4">
		<h3>Service</h3>
		<p>
			Tanggal : <?php echo $detail['tanggal_order']; ?> <br>
			Status: <?php echo $detail["status_service"]; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<p>
			<?php echo $detail['telepon_pelanggan'];?> <br>
			<?php echo $detail['email_pelanggan']; ?><br>
			<?php echo $detail['alamat_pelanggan']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Identitas Kendaraan</h3>
		<strong><?php echo $detail["plat_nomor_pelanggan"]; ?></strong><br>
		<p>
			<?php echo $detail["tipe_motor_pelanggan"]; ?><br>
			<?php echo $detail["rangka_pelanggan"]; ?><br>
			<?php echo $detail["mesin_pelanggan"]; ?>
		</p>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Penanganan</th>
			<th>Harga</th>
			<th>Keluhan</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM service_order JOIN service ON service_order.id_service=service.id_service WHERE service_order.id_order='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah ['penanganan_service']; ?></td>
			<td>Rp. <?php echo number_format($pecah ['harga_service']); ?></td>
			<td><?php echo $pecah ['keluhan']; ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>