<?php 
require('../class/db_config.php');
function createDirectory($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pemilik = $_POST['nama'];
    $id_pengajuan = $_POST['id_pengajuan'];
    $id_user = $_POST['id_user'];
    $targetDir = "uploads/".$nama_pemilik."/"; // Folder tempat menyimpan file yang diunggah
    createDirectory($targetDir); // Membuat folder jika belum ada
    $keterangan_file = strtoupper($_POST['keterangan']);

    $namaFile = $targetDir . $nama_pemilik."_".$keterangan_file.".".basename($_FILES["fileToUpload"]["type"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($namaFile,PATHINFO_EXTENSION));

    // Cek apakah file merupakan gambar
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File adalah gambar - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }
    }

    // Cek apakah file sudah ada di server
    if (file_exists($namaFile)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Batasan ukuran file
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Batasan format file
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk bernilai 0
    if ($uploadOk == 0) {
        echo "Maaf, file tidak dapat diunggah.";
    // Jika semuanya baik-baik saja, coba unggah file dan simpan informasi ke database
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $namaFile)) {
            // Menyimpan informasi file ke database
            $tanggal = date("Y-m-d");
            $sql = "INSERT INTO berkas (id_pengajuan, file, tgl_upload, status, keterangan) VALUES ('$id_pengajuan', '$namaFile', '$tanggal', 'DIAJUKAN','$keterangan_file')";
            if ($conn->query($sql) === TRUE) {
                echo "File ". $namaFile. " berhasil diunggah dan informasi tersimpan di database.";
                    $datetime = date('Y-m-d H:i:s');
                    $string = "UPLOAD BERKAS ".$keterangan_file." DIAJUKAN";
                    $sql_status = "INSERT INTO status (id_user, waktu, keterangan) VALUES ('$id_user', '$datetime', '$string')";
                    $result_status = mysqli_query($conn, $sql_status);
                    header("Location: upload-berkas.php");
            } else {
                echo "Maaf, terjadi kesalahan saat menyimpan informasi ke database.";
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}