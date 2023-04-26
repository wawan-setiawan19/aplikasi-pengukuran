<?php

class Tanah{
    public function cekTanah($id_user){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM tanah WHERE id_user='$id_user'";
		$result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            return true;
        }else{
            return false;
        }
    }

    public function cekPengajuan($id_user){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM pengajuan WHERE id_user='$id_user'";
		$result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            return true;
        }else{
            return false;
        }
    }

    public function input_tanah($id_user, $nama, $alamat, $provinsi, $kabupaten, $kecamatan, $kelurahan, $status, $jenis, $luas, $batas_utara, $batas_selatan, $batas_barat, $batas_timur){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        $tanggal = date('Y-m-d');

        $sql = "INSERT INTO tanah (id_tanah, id_user, nama_pemilik, alamat, kelurahan, kecamatan, kabupaten, provinsi, status_tanah, jenis_tanah, luas_tanah, batas_utara, batas_selatan, batas_barat, batas_timur, tgl_input) VALUES (NULL, '$id_user', '$nama', '$alamat', '$kelurahan', '$kecamatan', '$kabupaten', '$provinsi', '$status', '$jenis', '$luas', '$batas_utara', '$batas_selatan', '$batas_barat', '$batas_timur', '$tanggal')";

		$result = mysqli_query($conn, $sql);

        if($result){
            $datetime = date('Y-m-d H:i:s');
            $sql_status = "INSERT INTO status (id_user, waktu, keterangan) VALUES ('$id_user', '$datetime', 'INPUT TANAH SUDAH BERHASIL')";
            $result_status = mysqli_query($conn, $sql_status);
            return true;
        }else{
            return false;
        }
    }

    public function cekStatus($id_user){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM status WHERE id_user='$id_user'";
		$result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }else{
            return false;
        }
    }
}