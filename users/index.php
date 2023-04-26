<?php
require_once('../abs_path.php');
session_start();
if(!$_SESSION['username']){
    header('Location:'.ROOT_PATH.'/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pengajuan Pengukuran Tanah</title>
	<link rel="stylesheet" type="text/css" href="<?= ROOT_PATH?>/assets/css/landing.css">
</head>
<body>
    <?php include('../assets/components/nav.php'); ?>
	<main>
		<div class="container">
			<h1>Selamat Datang, <?= $_SESSION['nama'] ?></h1>
			<section class="features">
			<div class="feature">
				<h3>Pengajuan Baru</h3>
				<p>Ajukan permintaan pengukuran tanah baru dengan mudah melalui sistem kami.</p>
				<a href="./progres.php" class="btn">Ajukan</a>
			</div>
			<div class="feature">
				<h3>Status Pengajuan</h3>
				<p>Cek status pengajuan pengukuran tanah Anda dengan mudah melalui sistem kami.</p>
				<a href="./cek-status.php" class="btn">Periksa</a>
			</div>
		</section>
		</div>
	</main>
	<footer>
		<p>Hak Cipta &copy; 2023 Sistem Pengajuan Pengukuran Tanah</p>
	</footer>
</body>
</html>
