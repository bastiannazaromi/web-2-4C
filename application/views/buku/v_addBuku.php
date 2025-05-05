<main class="app-main">
	<!--begin::App Content Header-->
	<div class="app-content-header">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"><?= $title; ?></h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('buku'); ?>">Buku</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Buku</li>
					</ol>
				</div>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content Header-->
	<!--begin::App Content-->
	<div class="app-content">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-12">
					<div class="card mb-4">
						<div class="card-header bg-primary text-white">
							Tambah Buku
						</div>
						<div class="card-body">
							<form action="<?= base_url('buku/postAdd'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<div class="mb-3">
									<label class="form-label">Judul Buku</label>
									<input type="text" name="judul" class="form-control" value="<?= set_value('judul'); ?>">
									<span class="text-danger"><?= form_error('judul'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Penulis</label>
									<select name="id_penulis" class="form-control">
										<option value="">-- Pilih Penulis --</option>
										<?php foreach ($penulis as $p) : ?>
											<option value="<?= $p->id; ?>" <?= (set_value('id_penulis') == $p->id ? 'selected' : ''); ?>><?= $p->nama; ?></option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger"><?= form_error('id_penulis'); ?></span>
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
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content-->
</main>