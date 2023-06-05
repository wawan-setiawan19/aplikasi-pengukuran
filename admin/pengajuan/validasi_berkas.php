<?php
include '../class/Pengajuan.php';

$id_pengajuan = $_GET['idp'];
$id_user = $_GET['idu'];

$pengajuan = new Pengajuan();

if($pengajuan->validasiBerkas($id_pengajuan, $id_user)){
    header("Location: ./index.php?p=pengajuan");
}else{
    echo "GAGAL";
}