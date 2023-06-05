<?php

class Berkas{
    public function getBerkasByID($id_pengajuan){
        require('db_config.php');
        if(!$conn){
            echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
        }

        $sql = "SELECT * FROM berkas WHERE id_pengajuan='$id_pengajuan'";
		$result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 1){
            return $result;
        }else{
            return false;
        }
    }
}