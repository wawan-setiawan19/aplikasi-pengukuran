<?php
    require('../class/Pengajuan.php');
    $petugas = new Pengajuan();
    $id_pengajuan = $_GET['idp'];
    $id_user = $_GET['idu'];
?>
<a href="?p=pengajuan" class="btn">Kembali</a>
<form action="pengajuan/proses-terbit-sertip.php" method="POST">
    <h1>INPUT TANGGAL PENGAMBILAN SERTIPIKAT</h1>
    <label for="tanggal"><b>TANGGAL PENGAMBILAN</b></label>
    <input type="hidden" name="id_pengajuan" id="id_pengajuan" value="<?=$id_pengajuan?>">
    <input type="hidden" name="id_user" id="id_user" value="<?=$id_user?>">
    <input type="date" name="tanggal" id="tanggal">
    <label for="status">Pilih Status Tanah:</label>
        <div class="select">
            <select name="status" id="status">
                <option value="">--Pilih Status Tanah--</option>
                <option value="Hak Milik">Hak Milik</option>
                <option value="Hak Pakai">Hak Pakai</option>
                <option value="Hak Sewa">Hak Sewa</option>
                <option value="Hak Guna Usaha">Hak Guna Usaha</option>
                <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
            </select>
        </div>
    
    <button id="submit-btn" type="submit">TERBITKAN TANGGAL</button>
</form>