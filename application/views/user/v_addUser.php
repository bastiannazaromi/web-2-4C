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
						<li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">User</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add User</li>
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
							Tambah User
						</div>
						<div class="card-body">
							<form action="<?= base_url('user/postAdd'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<div class="mb-3">
									<label class="form-label">Nama</label>
									<input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" autocomplete="off" required>
									<span class="text-danger"><?= form_error('nama'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Username</label>
									<input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>" autocomplete="off" required>
									<span class="text-danger"><?= form_error('username'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Email</label>
									<input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>" autocomplete="off" required>
									<span class="text-danger"><?= form_error('email'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Tahun Lahir</label>
									<input type="number" name="tahun" class="form-control" value="<?= set_value('tahun'); ?>">
									<span class="text-danger"><?= form_error('tahun'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Nomor Handphone</label>
									<input type="number" name="no_hp" class="form-control" value="<?= set_value('no_hp'); ?>" autocomplete="off" required>
									<span class="text-danger"><?= form_error('no_hp'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Role</label>
									<select name="role" class="form-control">
										<option value="">-- Pilih Role User --</option>
										<option value="1" <?= (set_value('role') == '1' ? 'selected' : ''); ?>>Admin</option>
										<option value="2" <?= (set_value('role') == '2' ? 'selected' : ''); ?>>User</option>
									</select>
									<span class="text-danger"><?= form_error('role'); ?></span>
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