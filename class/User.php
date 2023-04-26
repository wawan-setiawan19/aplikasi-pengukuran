<?php

class User {
	private $username;
	private $password;
	private $email;
    private $nik;
    private $nama;

	public function __construct($username='', $password='', $email='', $nik='', $nama=''){
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->nik = $nik;
		$this->nama = $nama;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getNama() {
		return $this->nama;
	}

	public function setNama($nama) {
		$this->nama = $nama;
	}

	public function getNIK() {
		return $this->nik;
	}

	public function setNIK($nik) {
		$this->nik = $nik;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function login() {
		// Buat koneksi ke database
		require_once('db_config.php');
		// Cek apakah koneksi berhasil
		if (!$conn) {
			// Jika koneksi gagal, tampilkan pesan error
			echo "Koneksi gagal: " . mysqli_connect_error();
			exit;
		}
	
		// Escape string untuk menghindari SQL injection
		$username = mysqli_real_escape_string($conn, $this->username);
		$password = mysqli_real_escape_string($conn, $this->password);

		
		// Query untuk mencari data pengguna berdasarkan username
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		
		// Cek apakah username ditemukan
		if (mysqli_num_rows($result) == 1) {
			// Jika username ditemukan, verifikasi password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row['password'])) {
				// Jika password benar, simpan informasi pengguna ke session dan arahkan ke halaman dashboard
				session_start();
				$_SESSION['username'] = $row['username'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['role'] = $row['role'];
				mysqli_close($conn);
				return true;
			} else {
				// Jika password salah, tampilkan pesan error
				echo "Password salah.";
				mysqli_close($conn);
				return false;
			}
		} else {
			// Jika username tidak ditemukan, tampilkan pesan error
			echo "Username salah";
			mysqli_close($conn);
			return false;
		}
	}
	

	public function register() {
		require_once('db_config.php');
        // Cek apakah koneksi berhasil
        if (!$conn) {
            // Jika koneksi gagal, tampilkan pesan error
            echo "Koneksi gagal: " . mysqli_connect_error();
            exit;
        }
    
        // Escape string untuk menghindari SQL injection
        $username = mysqli_real_escape_string($conn, $this->username);
        $password = mysqli_real_escape_string($conn, $this->password);
        $email = mysqli_real_escape_string($conn, $this->email);
        $nik = mysqli_real_escape_string($conn, $this->nik);
        $nama = mysqli_real_escape_string($conn, $this->nama);
    
        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO users (username, password, email, nik, nama, role) VALUES ('$username', '$hashed_password', '$email', '$nik', '$nama', 'user')";
    
        // Eksekusi query
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

	public function logout(){
		// memulai session
		session_start();

		// menghapus semua session
		session_unset();

		// menghancurkan session
		session_destroy();

		// redirect ke halaman login
		header("Location: login.php");
		exit;
	}
}
?>
