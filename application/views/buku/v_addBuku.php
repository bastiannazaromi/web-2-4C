<h2 class="text-center"><?= $title; ?></h2>

<!-- Form Tambah Buku -->
<div class="card mb-4">
	<div class="card-header bg-primary text-white">
		Tambah Buku
	</div>
	<div class="card-body">
		<form action="<?= base_url('buku/postAdd'); ?>" method="POST">
			<div class="mb-3">
				<label class="form-label">Judul Buku</label>
				<input type="text" name="judul" class="form-control" value="<?= set_value('judul'); ?>">
				<span class="text-danger"><?= form_error('judul'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Penulis</label>
				<input type="text" name="penulis" class="form-control" value="<?= set_value('penulis'); ?>">
				<span class="text-danger"><?= form_error('penulis'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Penerbit</label>
				<input type="text" name="penerbit" class="form-control" value="<?= set_value('penerbit'); ?>">
				<span class="text-danger"><?= form_error('penerbit'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Tahun Terbit</label>
				<input type="number" name="tahun" class="form-control" value="<?= set_value('tahun'); ?>">
				<span class="text-danger"><?= form_error('tahun'); ?></span>
			</div>
			<div class="mb-3">
				<label class="form-label">Jumlah Halaman</label>
				<input type="number" name="jumlah_halaman" class="form-control" value="<?= set_value('jumlah_halaman'); ?>">
				<span class="text-danger"><?= form_error('jumlah_halaman'); ?></span>
			</div>
			<button type="submit" class="btn btn-success">Tambah Buku</button>
		</form>
	</div>
</div>