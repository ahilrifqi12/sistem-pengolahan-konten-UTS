<h2>Paket Service</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Penanganan</th>
			<th>Harga</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM service") ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['penanganan_service']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_service']); ?></td>
			<td><?php echo $pecah['keterangan_service']; ?></td>
			<td>
				<a href="index.php?halaman=hapusservice&id=<?php echo $pecah['id_service']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahservice&id=<?php echo $pecah['id_service']; ?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
	<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahservice" class="btn btn-primary">Tambah Data</a>