<?php
require_once('../abs_path.php');
require_once('../class/Tanah.php');
require_once('../class/Berkas.php');
session_start();
if(!$_SESSION['username']){
    header('Location:'.ROOT_PATH.'/login.php');
}

$tanah = new Tanah();
$berkas = new Berkas();

if ($tanah->getTanahById($_SESSION['id'])) {
    $result = $tanah->getTanahById($_SESSION['id']);
    foreach ($result as $data) {
    }
}

if($tanah->getPengajuanById($_SESSION['id'])){
    $pengajuan = $tanah->getPengajuanById($_SESSION['id']);
    foreach($pengajuan as $item){}
}

if($berkas->getBerkasByID($item['id_pengajuan'])){
    $dataBerkas = $berkas->getBerkasByID($item['id_pengajuan']);
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#fileTable').DataTable();
        });
    </script>
  </head>
  <body>
  <?php include('../assets/components/nav.php'); ?>
  <div class="card register">
    <table id="fileTable">
            <thead>
                <tr>
                    <th>Nama File</th>
                    <th>Tanggal Unggah</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataBerkas as $row) : ?>
                    <tr>
                        <td><?= $row['keterangan'] ?></td>
                        <td><?= $row['tgl_upload'] ?></td>
                        <td>
                            <a href="./<?=$row['file']?>" target="_blank">
                                <img src="./<?=$row['file']?>" alt="" height="100px">
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
  </div>
    <div class="register">
      <!-- <form action="" method="GET" id="my-form"> -->
      <form action="proses-upload-file.php" method="POST" id="my-form" enctype="multipart/form-data">
        <h2 class="login-text">UNGGAH BERKAS</h2>
        <input type="hidden" value="<?= $_SESSION['id'] ?>" name="id_user" required>
        <input type="hidden" value="<?= $item['id_pengajuan'] ?>" name="id_pengajuan" required>
        <input type="hidden" value="<?= $data['nama_pemilik'] ?>" name="nama" required readonly>
        <label for="keterangan"><b>Jenis Berkas</b></label>
        <div class="select">
            <select name="keterangan" id="keterangan">
                <option value="ktp">KTP</option>
                <option value="kk">KK</option>
                <option value="sertip-tanah">Sertipikat Tanah</option>
            </select>
        </div>
        <label for="fileToUpload"><b>Berkas</b></label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <button id="submit-btn" type="submit">Unggah Berkas</button>
        <div class="bottom-text">
          <div>Belum siap unggah? <a href="./progres.php">Kembali</a></div>
        </div>
      </form>
    </div>
  </body>
</html>
