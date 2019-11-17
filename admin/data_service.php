<h2>Data service</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status Service</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM service_order JOIN pelanggan ON service_order.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_order']; ?></td>
			<td><?php echo $pecah['status_service']; ?></td>
			<td>
				<a href="index.php?halaman=detail_service&id=<?php echo $pecah['id_order']; ?>"class="btn btn-info">detail</a>

				<?php if ($pecah['status_service']!=="pending"):?>
				<a href="index.php?halaman=keterangan&id=<?php echo $pecah['id_order'] ?>" class="btn btn-success">Keterangan</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>