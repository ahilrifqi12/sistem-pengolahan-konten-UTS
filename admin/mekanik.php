<h2>Data Mekanik</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Foto</th>
			<th>Pelatihan</th>
			<th>Keahlian</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM mekanik") ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_mekanik']; ?></td>
			<td>
				<img src="../foto_mekanik/<?php echo $pecah['foto_mekanik']; ?>" width="100">
			</td>
			<td><?php echo $pecah['pelatihan_mekanik']; ?></td>
			<td><?php echo $pecah['keahlian_mekanik']; ?></td>
			
			<td>
				<a href="index.php?halaman=hapusmekanik&id=<?php echo $pecah['id_mekanik']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahmekanik&id=<?php echo $pecah['id_mekanik']; ?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
	<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahmekanik" class="btn btn-primary">Tambah Data</a>