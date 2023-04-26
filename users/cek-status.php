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

$status = $tanah->cekStatus($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pengajuan Pengukuran Tanah</title>
	<link rel="stylesheet" type="text/css" href="<?= ROOT_PATH?>/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="<?= ROOT_PATH?>/assets/css/status-pengajuan.css">
</head>
<body>
    <?php include('../assets/components/nav.php'); ?>
	<main>
        <div class="container">
            <div class="wrapper">
                <h1> Status Progress Pengajuan</h1>
                <ul class="sessions">
                    <?php foreach($status as $item) :?>
                        <li>
                            <div class="time"><?= $item['waktu'] ?></div>
                            <p><?= $item['keterangan'] ?></p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div> 
	</main>
	<footer>
		<p>Hak Cipta &copy; 2023 Sistem Pengajuan Pengukuran Tanah</p>
	</footer>
</body>
</html>