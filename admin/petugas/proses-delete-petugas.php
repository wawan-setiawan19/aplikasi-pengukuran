<?php
// Include file yang berisi class User
include '../../class/Petugas.php';

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Ambil nilai dari form
	$nomor = $_POST['nomor'];

	// Buat objek User dan isi dengan nilai dari form
	$petugas = new Petugas();

	// Lakukan proses registrasi dengan method register
	if ($petugas->delete($nomor)) {
		// Jika berhasil, tampilkan pesan sukses
        header("Location: ../index.php?p=petugas");
	} else {
		// Jika gagal, tampilkan pesan gagal
		echo "Input gagal!";
	}
}
?>
