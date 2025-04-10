<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>

	<!-- Memuat file CSS dari folder assets/front/style.css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/style.css'); ?>">
</head>

<body>
	<h2>Form Login</h2>

	<!-- Tampilkan pesan error dari session flashdata, jika ada -->
	<?php if ($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>

	<!-- Form login mengarah ke method 'proses' di controller Login -->
	<form action="<?= base_url('login/proses'); ?>" method="POST" id="loginForm">
		<label for="username">Username</label><br>
		<input type="text" id="username" name="username" required autocomplete="off"><br><br>

		<label for="password">Password</label><br>
		<input type="password" id="password" name="password" required autocomplete="off"><br><br>

		<!-- Tombol login dengan type button (bukan submit), di-handle lewat JS -->
		<button type="button" id="loginButton">Login</button>
	</form>

	<!-- Memuat file JavaScript dari folder assets/front/script.js -->
	<script src="<?= base_url('assets/front/script.js'); ?>"></script>
</body>

</html>