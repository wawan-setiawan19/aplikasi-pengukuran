<?php

include('../class/Petugas.php');
$id_petugas = $_GET['idp'];
$petugas = new Petugas();
$data_petugas = $petugas->getPetugasById($id_petugas);

?>
<a href="?p=petugas" class="btn">Kembali</a>
<form action="pages/proses-delete-petugas.php" method="POST">
    <h1>Hapus Petugas</h1>
    <label for="nomor"><b>Nomor Petugas</b></label>
    <input type="text" id="" placeholder="Masukkan nomor petugas" name="" value="<?= $data_petugas['nomor_petugas']?>" disabled>
    <input type="hidden" id="nomor" placeholder="Masukkan nomor petugas" name="nomor" value="<?= $data_petugas['nomor_petugas']?>">
    <label for="nama"><b>Nama Petugas</b></label>
    <input type="text" id="" placeholder="Masukkan nomor petugas" name="" value="<?= $data_petugas['nomor_petugas']?>" disabled>
    <button id="submit-btn" type="submit">Hapus Data Petugas</button>
</form>