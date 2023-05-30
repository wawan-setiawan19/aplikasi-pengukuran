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
  <link rel="stylesheet" type="text/css" href="<?= ROOT_PATH ?>/assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="./admin.css">
	<link rel="stylesheet" type="text/css" href="./table.css">
	<link rel="stylesheet" type="text/css" href="./pagination.css">
</head>
<body>
    <?php include('../assets/components/nav.php'); ?>
  <main>
    <button id="openNav">&#9776;</button>
    <div class="container">
      <?php
        if (isset($_GET['p'])) {
          $page = $_GET['p'];
          switch ($page) {
            case 'petugas':
              include('petugas/petugas.php');
              break;
            case 'tambah_petugas':
              include('petugas/tambah_petugas.php');
              break;
            case 'edit_petugas':
              include('petugas/edit_petugas.php');
              break;
            case 'delete_petugas':
              include('petugas/delete_petugas.php');
              break;
            case 'pengajuan':
              include('pengajuan/pengajuan.php');
            default:
              include('pages/404.php');
              break;
          }
        }else{
          include('petugas/beranda.php');
        }
      ?>
    </div>
  </main>
  <script src="admin.js"></script>
</body>
</html>

</body>
</html>
