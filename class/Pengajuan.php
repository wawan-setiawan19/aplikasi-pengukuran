<?php

class Pengajuan{
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
        $tanggal_survey = date('Y-m-d');
        $tanggal_survey = date('Y-m-d', strtotime($tanggal_survey. ' + 7 days'));
        $sql = "UPDATE pengajuan SET status_permohonan='PROSES UKUR', tgl_survey='$tanggal_survey' WHERE id_pengajuan='$id_pengajuan'";
        
        if (mysqli_query($conn, $sql)) {
            $string = "PROSES UKUR AKAN DIMULAI TANGGAL ".$tanggal_survey;
            $this->updateStatus($id_user, $string);
            mysqli_close($conn);
            return true;
        } else {
            // Jika query gagal, tampilkan pesan error, tutup koneksi, dan return false
            echo "Error: " . mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }
    }

    public function validasiBerkas($id_pengajuan, $id_user){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        $sql = "UPDATE pengajuan SET status_permohonan='BERKAS VALID' WHERE id_pengajuan='$id_pengajuan'";
        $sql_berkas = "UPDATE berkas SET status='VALID' WHERE id_pengajuan='$id_pengajuan'";
        
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_berkas)) {
            $this->updateStatus($id_user, "BERKAS SUDAH DIVALIDASI");
            mysqli_close($conn);
            return true;
        } else {
            // Jika query gagal, tampilkan pesan error, tutup koneksi, dan return false
            echo "Error: " . mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }
    }

    public function terbitSertip($id_user, $id_pengajuan, $tanggal, $status_tanah){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }
        $sql = "UPDATE pengajuan SET status_permohonan='DONE', tgl_ambil_sertipikat='$tanggal', status_hak_tanah='$status_tanah' WHERE id_pengajuan='$id_pengajuan'";
        
        if (mysqli_query($conn, $sql)) {
            $string = "ANDA DAPAT MENGAMBIL SERTIPIKAT PADA TANGGAL ".$tanggal;
            $this->updateStatus($id_user, $string);
            mysqli_close($conn);
            return true;
        } else {
            // Jika query gagal, tampilkan pesan error, tutup koneksi, dan return false
            echo "Error: " . mysqli_error($conn);
            mysqli_close($conn);
            return false;
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
}