<?php
require_once('../abs_path.php');
require_once('../class/Tanah.php');
session_start();
if(!$_SESSION['username']){
    header('Location:'.ROOT_PATH.'/login.php');
}

$tanah = new Tanah();

if($tanah->cekPengajuan($_SESSION['id'])){
    header('Location: ./progres.php');
}

if ($tanah->getTanahById($_SESSION['id'])) {
    $result = $tanah->getTanahById($_SESSION['id']);
    foreach ($result as $data) {
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SiPPeTa - Form Info Pengajuan</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT_PATH ?>/assets/css/landing.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_PATH ?>/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_PATH ?>/assets/css/modal.css">
  </head>
  <body>
  <?php include('../assets/components/nav.php'); ?>
    <div class="register">
      <!-- <form action="" method="GET" id="my-form"> -->
      <form action="proses-input-pengajuan.php" method="POST" id="my-form">
        <h1 class="login-text">KONFIRMASI PENGAJUAN TANAH</h1>
        <input type="hidden" value="<?= $_SESSION['id'] ?>" name="id_user" required>
        <input type="hidden" value="<?= $data['id_tanah'] ?>" name="id_tanah" required>
        <label for="nama"><b>Nama Pemilik Tanah</b></label>
        <input type="text" id="nama" placeholder="Masukkan Nama Pemilik Tanah" name="nama" value="<?= $data['nama_pemilik'] ?>" disabled>
        
        <label for="alamat"><b>Alamat</b></label>
        <input type="text" placeholder="Masukkan Alamat Tanah" name="alamat" id="alamat" value="<?= $data['alamat']?>" disabled>

        <label for="luas"><b>Luas dalam meter persegi (contoh: 100.81)</b></label>
        <input type="text" placeholder="Masukkan Luas Tanah" name="luas" id="luas" value="<?= $data['luas_tanah'] ?>" disabled>
        
        <button id="submit-btn" type="submit">Ajukan Pengukuran</button>
        <div class="bottom-text">
          <div>Belum siap pengajuan? <a href="./progres.php">Kembali</a></div>
        </div>
      </form>
    </div>
  </body>
</html>
