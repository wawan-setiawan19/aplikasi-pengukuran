<?php
    require('../class/Petugas.php');
    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $mulai_data = $halaman > 1 ? ($halaman * 10) - 10 : 0;
    $petugas = new Petugas();
    $jumlah_petugas = $petugas->getTotalData();
    $total_halaman = ceil($jumlah_petugas/10);
    $data_petugas = $petugas->getPetugasByPage($mulai_data);
?>

<h1>
    Petugas
</h1>
<a href="?p=tambah_petugas" class="btn tambah">Tambah Petugas</a>
    <table>
        <thead>
            <tr>
                <th>
                    Nomor Petugas
                </th>
                <th>
                    Nama Petugas
                </th>
                <th>
                    Akumulasi Beban
                </th>
                <th>
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if($jumlah_petugas < 1 ) : ?>
            <tr>
                <td colspan=4>Belum ada data!</td>
            </tr>
            <?php else : ?>
                <?php foreach ($data_petugas as $data) : ?>
                    <tr>
                        <td><?= $data["nomor_petugas"] ?></td>
                        <td><?= $data["nama_petugas"] ?></td>
                        <td><?= $data["akumlasi_beban"] ?></td>
                        <td>
                            <a href="?p=edit_petugas&idp=<?=$data["nomor_petugas"]?>" class="btn">Edit</a>
                            <a href="?p=delete_petugas&idp=<?=$data["nomor_petugas"]?>" class="btn danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>

    <div>
        jumlah data = <?= $jumlah_petugas ?>
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