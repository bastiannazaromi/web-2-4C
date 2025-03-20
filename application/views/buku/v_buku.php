<h2 class="text-center"><?php echo $title; ?></h2>

<div class="row mb-3">
	<div class="col-lg-3">
		<a href="<?= base_url('buku/add'); ?>" class="btn btn-primary">Tambah</a>
	</div>
</div>

<!-- Tabel Daftar Buku -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				Daftar Buku
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead class="table-dark">
						<tr>
							<th>#</th>
							<th>Judul</th>
							<th>Penulis</th>
							<th>Penerbit</th>
							<th>Tahun</th>
							<th>Jumlah Halaman</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($buku)) : ?>
							<?php $no = 1;
							foreach ($buku as $b) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $b->judul; ?></td>
									<td><?= $b->penulis; ?></td>
									<td><?= $b->penerbit; ?></td>
									<td><?= $b->tahun; ?></td>
									<td><?= $b->jumlah_halaman; ?></td>
									<td>
										<a href="<?= base_url('buku/edit/' . $b->id); ?>" class="btn btn-warning btn-sm">Edit</a>
										<a href="<?= base_url('buku/delete/' . $b->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="7" class="text-center">Tidak ada data buku.</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>