<?php
    require('../class/Petugas.php');
    $petugas = new Petugas();
    $petugas_terakhir = $petugas->getLastData();
    $num = intval(substr($petugas_terakhir['nomor_petugas'], 3));
    if($num<10){
        $kode = "00".$num+1;
    }elseif ($num<100) {
        $kode = "0".$num+1;
    }else{
        $kode = $num+1;
    }
?>
<a href="?p=petugas" class="btn">Kembali</a>
<form action="petugas/proses-input-petugas.php" method="POST">
    <h1>Tambah Petugas</h1>
    <label for="nomor"><b>Nomor Petugas</b></label>
    <input type="text" id="nomor" placeholder="Masukkan nomor petugas" name="" value="<?= "PTG".$kode?>" required disabled>
    <input type="hidden" id="nomor" placeholder="Masukkan nomor petugas" name="nomor" value="<?= "PTG".$kode?>" required>
    <label for="nama"><b>Nama Petugas</b></label>
    <input type="text" id="nama" placeholder="Masukkan nama petugas" name="nama" required>
    <label for="password"><b>Password Petugas</b></label>
    <input type="text" id="password" placeholder="Masukkan password petugas" name="password" required>
    <button id="submit-btn" type="submit">Simpan Data Petugas</button>
</form>