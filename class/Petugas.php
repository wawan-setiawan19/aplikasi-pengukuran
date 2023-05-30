<?php

class Petugas{
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

    public function edit($nomor, $nama, $password){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        if($password !== ''){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE petugas SET nama_petugas='$nama',password='$hashed_password' WHERE nomor_petugas='$nomor'";
        }else{
            $sql = "UPDATE petugas SET nama_petugas='$nama' WHERE nomor_petugas='$nomor'";
        }

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

        $sql = "SELECT * FROM petugas";
		$result = mysqli_query($conn, $sql);

        return mysqli_num_rows($result);
    }

    public function getPetugasByPage($mulai){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM petugas LIMIT $mulai,10";
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