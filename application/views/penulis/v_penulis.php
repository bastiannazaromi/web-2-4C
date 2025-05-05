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
						<li class="breadcrumb-item active" aria-current="page">Penulis</li>
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
					<a href="<?= base_url('penulis/add'); ?>" class="btn btn-primary">Tambah</a>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">
							Daftar Penulis
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>Nama Penulis</th>
										<th>Tanggal Lahir</th>
										<th>Alamat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($penulis)) : ?>
										<?php $no = 1;
										foreach ($penulis as $b) : ?>
											<tr>
												<td class="text-center"><?= $no++; ?></td>
												<td><?= $b->nama; ?></td>
												<td><?= date('d M Y', strtotime($b->tanggal_lahir)); ?></td>
												<td><?= $b->alamat; ?></td>
												<td>
													<a href="<?= base_url('penulis/edit/' . $b->id); ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="<?= base_url('penulis/delete/' . $b->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="7" class="text-center">Tidak ada data penulis.</td>
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