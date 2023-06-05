<?php
require_once('../abs_path.php');
require_once('../class/Tanah.php');
require_once('../class/Berkas.php');
if(!$_SESSION['username']){
    header('Location:'.ROOT_PATH.'/login.php');
}
$id_user = $_GET['idu'];
$id_pengajuan = $_GET['idp'];
$berkas = new Berkas();

if($berkas->getBerkasByID($id_pengajuan)){
    $dataBerkas = $berkas->getBerkasByID($id_pengajuan);
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
  <div class="card register">
  <a href="?p=validasi_berkas&idp=<?=$id_pengajuan?>&idu=<?=$id_user?>" class="btn">VALIDASI BERKAS</a>
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
                            <a href="../users/<?=$row['file']?>" target="_blank">
                                <img src="../users/<?=$row['file']?>" alt="" height="100px">
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
  </div>
  </body>
</html>
