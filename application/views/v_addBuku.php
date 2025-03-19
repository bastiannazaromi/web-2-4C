<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<div class="container mt-4">
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
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>