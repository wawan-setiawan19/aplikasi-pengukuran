<?php
// Include file yang berisi class User
include './class/User.php';

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Ambil nilai dari form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Buat objek User dan isi dengan nilai dari form
	$user = new User($username, $password);

	// Lakukan proses registrasi dengan method register
	if ($user->login()) {
		// Jika berhasil, tampilkan pesan sukses
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		if($_SESSION['role']=='admin'){
			header("Location: admin/index.php");
		}else{
			header("Location: users/index.php");
		}
		
	} else {
		// Jika gagal, tampilkan pesan gagal
		echo "Login gagal!";
	}
}
?>
