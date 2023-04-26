<?php
// Include file yang berisi class User
include './class/User.php';

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Ambil nilai dari form
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];

	// Buat objek User dan isi dengan nilai dari form
	$user = new User($username, $password, $email, $nik, $nama);

	// Lakukan proses registrasi dengan method register
	if ($user->register()) {
		// Jika berhasil, tampilkan pesan sukses
        header("Location: login.php");
	} else {
		// Jika gagal, tampilkan pesan gagal
		echo "Registrasi gagal!";
	}
}
?>
