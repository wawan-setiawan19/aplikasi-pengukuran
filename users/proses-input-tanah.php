<?php
// Include file yang berisi class User
include '../class/Tanah.php';

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Ambil nilai dari form
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$provinsi = $_POST['provinsi'];
	$kota = $_POST['kota'];
	$kecamatan = $_POST['kecamatan'];
	$desa = $_POST['desa'];
	$status = $_POST['status'];
	$jenis = $_POST['jenis'];
	$luas = $_POST['luas'];
	$batas_utara = $_POST['batas_utara'];
	$batas_selatan = $_POST['batas_selatan'];
	$batas_barat = $_POST['batas_barat'];
	$batas_timur = $_POST['batas_timur'];

	// Buat objek User dan isi dengan nilai dari form
	$tanah = new Tanah();

	// Lakukan proses registrasi dengan method register
	if ($tanah->input_tanah($id_user, $nama, $alamat, $provinsi, $kota, $kecamatan, $desa, $status, $jenis, $luas, $batas_utara, $batas_selatan, $batas_barat, $batas_timur)) {
		// Jika berhasil, tampilkan pesan sukses
        header("Location: progres.php");
	} else {
		// Jika gagal, tampilkan pesan gagal
		echo "Input gagal!";
	}
}
?>
