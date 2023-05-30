<?php
// Include file yang berisi class User
include '../class/Tanah.php';

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Ambil nilai dari form
	$id_user = $_POST['id_user'];
	$id_tanah = $_POST['id_tanah'];

	// Buat objek User dan isi dengan nilai dari form
	$tanah = new Tanah();

	// Lakukan proses registrasi dengan method register
	if ($tanah->input_pengajuan($id_user, $id_tanah)) {
		// Jika berhasil, tampilkan pesan sukses
        header("Location: progres.php");
	} else {
		// Jika gagal, tampilkan pesan gagal
		echo "Input gagal!";
	}
}
?>
