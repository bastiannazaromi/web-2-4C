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
						<li class="breadcrumb-item"><a href="<?= base_url('penulis'); ?>">Penulis</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Penulis</li>
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
							Edit Penulis
						</div>
						<div class="card-body">
							<form action="<?= base_url('penulis/update'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
								<input type="hidden" name="id" value="<?= $penulis->id; ?>" required>

								<div class="mb-3">
									<label class="form-label">Nama Penulis</label>
									<input type="text" name="nama" class="form-control" value="<?= $penulis->nama; ?>" autocomplete="off" required>
									<span class="text-danger"><?= form_error('nama'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Tanggal Lahir</label>
									<input type="date" name="tanggal_lahir" class="form-control" value="<?= $penulis->tanggal_lahir; ?>">
									<span class="text-danger"><?= form_error('tanggal_lahir'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Alamat</label>
									<textarea name="alamat" class="form-control" rows="5"><?= $penulis->alamat; ?></textarea>
									<span class="text-danger"><?= form_error('alamat'); ?></span>
								</div>
								<button type="submit" class="btn btn-primary">Simpan</button>
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