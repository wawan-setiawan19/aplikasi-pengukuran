<?php
// Include file yang berisi class User
include '../../class/Pengajuan.php';

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Ambil nilai dari form
	$id_user = $_POST['id_user'];
	$id_pengajuan = $_POST['id_pengajuan'];
	$tanggal = $_POST['tanggal'];
	$status_tanah = $_POST['status'];

	// Buat objek User dan isi dengan nilai dari form
	$pengajuan = new Pengajuan();

	// Lakukan proses registrasi dengan method register
	if ($pengajuan->terbitSertip($id_user, $id_pengajuan, $tanggal, $status_tanah)) {
		// Jika berhasil, tampilkan pesan sukses
        header("Location: ../index.php?p=pengajuan");
	} else {
		// Jika gagal, tampilkan pesan gagal
		echo "Input gagal!";
	}
}
?>
