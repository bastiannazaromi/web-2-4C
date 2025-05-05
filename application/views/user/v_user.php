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
						<li class="breadcrumb-item active" aria-current="page">User</li>
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
			<div class="row mb-3">
				<div class="col-lg-3">
					<a href="<?= base_url('user/add'); ?>" class="btn btn-primary">Tambah</a>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">
							Daftar User
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Username</th>
										<th>Tahun Lahir</th>
										<th>Nomor Handphone</th>
										<th>Role</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($user)) : ?>
										<?php $no = 1;
										foreach ($user as $u) : ?>
											<tr>
												<td class="text-center"><?= $no++; ?></td>
												<td><?= $u->nama; ?></td>
												<td><?= $u->email; ?></td>
												<td><?= $u->username; ?></td>
												<td><?= $u->tahun; ?></td>
												<td><?= $u->no_hp; ?></td>
												<td class="text-center">
													<?php if ($u->role == 1) : ?>
														<span class="badge bg-danger">Admin</span>
													<?php else : ?>
														<span class="badge bg-primary">User</span>
													<?php endif; ?>
												</td>
												<td class="text-center">
													<div class="btn-group">
														<a href="<?= base_url('user/edit/' . $u->id); ?>" class="btn btn-warning btn-sm">Edit</a>
														<?php if ($u->role != 1) : ?>
															<a href="<?= base_url('user/delete/' . $u->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
														<?php endif; ?>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="7" class="text-center">Tidak ada data user.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
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