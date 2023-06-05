<?php
    require('../class/Pengajuan.php');
    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $mulai_data = $halaman > 1 ? ($halaman * 10) - 10 : 0;
    $pengajuan = new Pengajuan();
    $jumlah_pengajuan = $pengajuan->getTotalData();
    $total_halaman = ceil($jumlah_pengajuan/10);
    $data_pengajuan = $pengajuan->getPengajuanByPage($mulai_data);
?>

<h1>
    Petugas
</h1>
<a href="?p=tambah_petugas" class="btn tambah">Tambah Petugas</a>
    <table>
        <thead>
            <tr>
                <th>
                    ID PENGAJUAN
                </th>
                <th>
                    NAMA PEMILIK
                </th>
                <th>
                    PETUGAS
                </th>
                <th>
                    STATUS PERMOHONAN
                </th>
                <th>
                    TANGGAL PERMOHONAN
                </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if($jumlah_pengajuan < 1 ) : ?>
            <tr>
                <td colspan=4>Belum ada data!</td>
            </tr>
            <?php else : ?>
                <?php foreach ($data_pengajuan as $data) : ?>
                    <tr>
                        <td><?= $data["id_pengajuan"] ?></td>
                        <td><?= $data["nama_pemilik"] ?></td>
                        <td><?= $data["id_petugas"] ?></td>
                        <td><?= $data["status_permohonan"] ?></td>
                        <td><?= $data["tgl_permohonan"] ?></td>
                        <td>
                            <a href="?p=edit_petugas&idp=<?=$data["id_pengajuan"]?>" class="btn">Edit</a>
                            <a href="?p=delete_petugas&idp=<?=$data["id_pengajuan"]?>" class="btn danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>

    <div>
        jumlah data = <?= $jumlah_pengajuan ?>
    </div>

    <div id="app" class="container">  
        <ul class="page">
            <li class="page__btn"><span class="material-icons"><</span></li>
            <?php for($i=1; $i<=$total_halaman; $i++) : ?>
                <li class="page__numbers"> 1</li>
            <?php endfor ?>
            <li class="page__btn"><span class="material-icons">></span></li>
        </ul>
    </div>