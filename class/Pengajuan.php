<?php

class Pengajuan{
    public function create($nomor, $nama, $password, $beban){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO petugas (nomor_petugas, nama_petugas, password, akumlasi_beban) VALUES ('$nomor', '$nama', '$hashed_password', '$beban')";
        if (mysqli_query($conn, $sql)) {
            // Jika query berhasil, tutup koneksi dan return true
            mysqli_close($conn);
            return true;
        } else {
            // Jika query gagal, tampilkan pesan error, tutup koneksi, dan return false
            echo "Error: " . mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }
    }

    public function updateStatus($id_user, $message){
        require('db_config.php');
        $datetime = date('Y-m-d H:i:s');
        $sql_status = "INSERT INTO status (id_user, waktu, keterangan) VALUES ('$id_user', '$datetime', '$message')";
        $result_status = mysqli_query($conn, $sql_status);
    }

    public function ajukanPengukuran($id_pengajuan, $id_user){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        $sql = "UPDATE pengajuan SET status_permohonan='PROSES UKUR' WHERE id_pengajuan='$id_pengajuan'";
        
        if (mysqli_query($conn, $sql)) {
            $this->updateStatus($id_user, "PROSES UKUR DIMULAI");
            mysqli_close($conn);
            return true;
        } else {
            // Jika query gagal, tampilkan pesan error, tutup koneksi, dan return false
            echo "Error: " . mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }
    }

    public function delete($nomor){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "DELETE FROM petugas WHERE nomor_petugas='$nomor'";
        if (mysqli_query($conn, $sql)) {
            // Jika query berhasil, tutup koneksi dan return true
            mysqli_close($conn);
            return true;
        } else {
            // Jika query gagal, tampilkan pesan error, tutup koneksi, dan return false
            echo "Error: " . mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }
    }

    public function getPetugasById($id){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM petugas WHERE nomor_petugas='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            return mysqli_fetch_assoc($result);
        }
    }
    
    public function getTotalData(){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM pengajuan";
		$result = mysqli_query($conn, $sql);

        return mysqli_num_rows($result);
    }

    public function getPengajuanByPage($mulai){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM pengajuan join tanah on pengajuan.id_tanah = tanah.id_tanah LIMIT $mulai,10";
		$result = mysqli_query($conn, $sql);

        return $result;
    }

    public function getLastData(){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        $sql = "SELECT * FROM petugas ORDER BY nomor_petugas DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            return mysqli_fetch_assoc($result);
        }
    }

    public function getPetugas(){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        $sql = "SELECT * FROM petugas ORDER BY akumlasi_beban DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            return mysqli_fetch_assoc($result);
        }
    }
}