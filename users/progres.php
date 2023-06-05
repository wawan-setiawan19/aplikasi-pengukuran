<?php
require_once('../abs_path.php');
require_once('../class/Tanah.php');
session_start();
if(!$_SESSION['username']){
    header('Location:'.ROOT_PATH.'/login.php');
}

if($_SESSION['role']!=="user"){
    header('Location:'.ROOT_PATH);
}

$tanah = new Tanah();

if($tanah->cekTanah($_SESSION['id'])){
    $status_tanah = true;
}

if($tanah->cekPengajuan($_SESSION['id'])){
    $status_pengajuan = true;
    $status_berkas = false;
}
if($tanah->cekBerkas($_SESSION['id'])){
    $status_berkas = true;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pengajuan Pengukuran Tanah</title>
	<link rel="stylesheet" type="text/css" href="<?= ROOT_PATH?>/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="<?= ROOT_PATH?>/assets/css/progres.css">
</head>
<body>
    <?php include('../assets/components/nav.php'); ?>
	<main>
		<div class="container">
            <div class="timeline">
                <div class="timeline-empty"></div>
                <div class="timeline-middle <?= $status_tanah?"timeline-success":"" ?>">
                    <div class="timeline-circle <?= $status_tanah?"timeline-success":"" ?>"></div>
                </div>
                <div class="timeline-component timeline-content <?= $status_tanah?"timeline-content-sucess":"" ?>">
                    <h3>Input Informasi Tanah</h3>
                    <p>Silakan masukkan informasi mengenai tanah yang akan anda ukur terlebih dahulu</p>
                    <a href="input-tanah.php" class="btn <?= $status_tanah?"btn-disable":"" ?>">Input Tanah</a>
                </div>
                <div class="timeline-component timeline-content <?= $status_pengajuan?"timeline-content-sucess":"" ?>">
                    <h3>Input Pengajuan Pengukuran</h3>
                    <p>Silakan masukkan informasi yang dibutuhkan pada pengukuran</p>
                    <a href="input-pengajuan.php" class="btn <?= !$status_tanah || $status_pengajuan?"btn-disable":"" ?>">Input Pengajuan</a>
                </div>
                <div class="timeline-middle <?= $status_pengajuan?"timeline-success":"" ?>">
                    <div class="timeline-circle <?= $status_pengajuan?"timeline-success":"" ?>"></div>
                </div>
                <div class="timeline-empty"></div>
                <div class="timeline-empty"></div>
                <div class="timeline-middle <?= $status_berkas?"timeline-success":"" ?>">
                    <div class="timeline-circle <?= $status_berkas?"timeline-success":"" ?>"></div>
                </div>
                <div class="timeline-component timeline-content <?= $status_berkas?"timeline-content-sucess":"" ?>">
                    <h3>Upload Berkas</h3>
                    <p>Silakan upload berkas untuk kelengkapan pembuatan sertipikat tanah</p>
                    <a href="upload-berkas.php" class="btn <?= !$status_pengajuan || $status_berkas?"btn-disable":"" ?>">Upload Berkas</a>
                </div>
                <div class="timeline-component timeline-content <?= $status_berkas?"timeline-content-sucess":"" ?>">
                    <h3>Tahapan Input Selesai</h3>
                    <p>Anda bisa periksa status pengajuan untuk mengetahui tanggal pengambilan sertipikat</p>
                    <a href="cek-status.php" class="btn <?= $status_berkas?"":"btn-disable" ?>">Periksa Status Pengajuan</a>
                </div>
                <div class="timeline-middle <?= $status_pengajuan?"timeline-success":"" ?>">
                    <div class="timeline-circle <?= $status_pengajuan?"timeline-success":"" ?>"></div>
                </div>
            </div>
		</div>
	</main>
	<footer>
		<p>Hak Cipta &copy; 2023 Sistem Pengajuan Pengukuran Tanah</p>
	</footer>
</body>
</html>
