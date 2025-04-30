<h2 class="text-center"><?= $title; ?></h2>

<!-- Form Tambah Buku -->
<div class="card mb-4">
	<div class="card-header bg-primary text-white">
		Edit Buku
	</div>
	<div class="card-body">
		<form action="<?= base_url('buku/update'); ?>" method="POST">
			<input type="hidden" name="id" value="<?= $buku->id; ?>" required>

			<div class="mb-3">
				<label class="form-label">Judul Buku</label>
				<input type="text" name="judul" class="form-control" value="<?= $buku->judul; ?>" required>
				<span class="text-danger"><?= form_error('judul'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Penulis</label>
				<input type="text" name="penulis" class="form-control" value="<?= $buku->penulis; ?>" required>
				<span class="text-danger"><?= form_error('penulis'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Penerbit</label>
				<input type="text" name="penerbit" class="form-control" value="<?= $buku->penerbit; ?>" required>
				<span class="text-danger"><?= form_error('penerbit'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Tahun Terbit</label>
				<input type="number" name="tahun" class="form-control" value="<?= $buku->tahun; ?>" required>
				<span class="text-danger"><?= form_error('tahun'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Jumlah Halaman</label>
				<input type="number" name="jumlah_halaman" class="form-control" value="<?= $buku->jumlah_halaman; ?>" required>
				<span class="text-danger"><?= form_error('jumlah_halaman'); ?></span>
			</div>

			<a href="<?= base_url('buku'); ?>" class="btn btn-warning">Batal</a>
			<button type="submit" class="btn btn-success">Update Buku</button>
		</form>
	</div>
</div>