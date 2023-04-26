<?php
require_once('../abs_path.php');
require_once('../class/Tanah.php');
session_start();
if(!$_SESSION['username']){
    header('Location:'.ROOT_PATH.'/login.php');
}

$tanah = new Tanah();

if($tanah->cekTanah($_SESSION['id'])){
    header('Location: ./progres.php');
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SiPPeTa - Form Info Tanah</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT_PATH ?>/assets/css/landing.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_PATH ?>/assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT_PATH ?>/assets/css/modal.css">
  </head>
  <body>
  <?php include('../assets/components/nav.php'); ?>
    <div class="register">
      <!-- <form action="" method="GET" id="my-form"> -->
      <form action="proses-input-tanah.php" method="POST" id="my-form">
        <h1 class="login-text">FORM INPUT TANAH</h1>
        <input type="hidden" value="<?= $_SESSION['id'] ?>" name="id_user" required>
        <label for="nama"><b>Nama Pemilik Tanah</b></label>
        <input type="text" id="nama" placeholder="Masukkan Nama Pemilik Tanah" name="nama" required>
        
        <label for="alamat"><b>Alamat</b></label>
        <input type="text" placeholder="Masukkan Alamat Tanah" name="alamat" id="alamat" required>

        <label for="provincies">Pilih Provinsi:</label>
        <div class="select">
            <select name="provinsi" id="provincies"></select>
        </div>
        <label for="city">Pilih Kabupaten/Kota:</label>
        <div class="select">
            <select name="kota" id="city"></select>
        </div>
        <label for="district">Pilih Kecamatan:</label>
        <div class="select">
            <select name="kecamatan" id="district"></select>
        </div>
        <label for="subdistrict">Pilih Kelurahan/Desa:</label>
        <div class="select">
            <select name="desa" id="subdistrict"></select>
        </div>
        <label for="status">Pilih Status Tanah:</label>
        <div class="select">
            <select name="status" id="status">
                <option value="">--Pilih Status Tanah--</option>
                <option value="Hak Milik">Hak Milik</option>
                <option value="Hak Pakai">Hak Pakai</option>
                <option value="Hak Sewa">Hak Sewa</option>
                <option value="Hak Guna Usaha">Hak Guna Usaha</option>
                <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
            </select>
        </div>
        <label for="jenis">Pilih Jenis Tanah:</label>
        <div class="select">
            <select name="jenis" id="jenis">
                <option value="">--Pilih Jenis Tanah--</option>
                <option value="Tanah Pertanian">Tanah Pertanian</option>
                <option value="Tanah Bangunan">Tanah Bangunan</option>
                <option value="Tanah Perkebunan">Tanah Perkebunan</option>
                <option value="Tanah Hutan">Tanah Hutan</option>
                <option value="Tanah Kosong">Tanah Kosong</option>
            </select>
        </div>

        <label for="luas"><b>Luas dalam meter persegi (contoh: 100.81)</b></label>
        <input type="text" placeholder="Masukkan Luas Tanah" name="luas" id="luas" required>

        <label for="batas_utara"><b>Batas tanah bagian utara</b></label>
        <input type="text" placeholder="Masukkan Batas Utara Tanah" name="batas_utara" id="utara" required>

        <label for="batas_selatan"><b>Batas tanah bagian selatan</b></label>
        <input type="text" placeholder="Masukkan Batas Selatan Tanah" name="batas_selatan" id="selatan" required>

        <label for="batas_barat"><b>Batas tanah bagian barat</b></label>
        <input type="text" placeholder="Masukkan Batas Barat Tanah" name="batas_barat" id="barat" required>

        <label for="batas_timur"><b>Batas tanah bagian timur</b></label>
        <input type="text" placeholder="Masukkan Batas Timur Tanah" name="batas_timur" id="timur" required>
        
        <button id="submit-btn" type="submit">Input Data</button>
        <div class="bottom-text">
          <div>Belum siap input? <a href="./progres.php">Kembali</a></div>
        </div>
      </form>
    </div>

    <div class="toast-container"></div>

    <?php include('../assets/components/modal-confirmation.php'); ?>

    <script>
        const inputNama = document.querySelector("#nama")
        const inputAlamat = document.querySelector("#alamat")        
        const inputLuas = document.querySelector("#luas")
        const inputUtara = document.querySelector("#utara")
        const inputSelatan = document.querySelector("#selatan")
        const inputBarat = document.querySelector("#barat")
        const inputTimur = document.querySelector("#timur")
        const provinsiSelect = document.querySelector("#provincies")
        const citySelect = document.querySelector("#city")
        const districtSelect = document.querySelector("#district")
        const subdistrictSelect = document.querySelector("#subdistrict")
        const statusSelect = document.querySelector("#status")
        const jenisSelect = document.querySelector("#jenis")
        
        const toastContainer = document.querySelector(".toast-container")

        const cekInputKosong = () => {
            let toastElement = ''
            let status = false;
            if(inputNama.value == ""){
                toastElement += toastError('Nama')
                status = true;
            }
            if(inputAlamat.value == ""){
                toastElement += toastError('Alamat')
                status = true;
            }
            if(provinsiSelect.value == ""){
                toastElement += toastError('Provinsi')
                status = true;
            }
            if(citySelect.value == ""){
                toastElement += toastError('Kota')
                status = true;
            }
            if(districtSelect.value == ""){
                toastElement += toastError('Kecamatan')
                status = true;
            }
            if(subdistrictSelect.value == ""){
                toastElement += toastError('Kelurahan')
                status = true;
            }
            if(statusSelect.value == ""){
                toastElement += toastError('Status')
                status = true;
            }
            if(jenisSelect.value == ""){
                toastElement += toastError('Jenis')
                status = true;
            }
            if(inputLuas.value == ""){
                toastElement += toastError('Luas')
                status = true;
            }
            if(isNaN(inputLuas.value)){
                toastElement += toastErrorMessage('Luas','harus angka')
                status = true;
            }
            
            if(inputUtara.value == ""){
                toastElement += toastError('Batas Utara')
                status = true;
            }
            if(inputSelatan.value == ""){
                toastElement += toastError('Batas Selatan')
                status = true;
            }
            if(inputBarat.value == ""){
                toastElement += toastError('Batas Barat')
                status = true;
            }
            if(inputTimur.value == ""){
                toastElement += toastError('Batas Timur')
                status = true;
            }
            toastContainer.innerHTML = toastElement
            return status;
        }

		// Ambil data dari API
		fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
		.then(response => response.json())
		.then(data => {
            const provincies = data.provinsi;
			// Loop data dan tambahkan ke select option
            let option = `<option value="">--Pilih Provinsi--</option>`
			provincies.forEach(provincy => {
                option += `<option id="${provincy.id}" value="${provincy.nama}">${provincy.nama}</option>`
			});

            provinsiSelect.innerHTML = option
		})
		.catch(error => console.error(error));

        provinsiSelect.addEventListener('change',(e)=>{
            const id_provinsi = e.target.selectedOptions[0].id;
            fetch(`https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id_provinsi}`)
            .then(response => response.json())
            .then(data => {
                const cities = data.kota_kabupaten;
                // Loop data dan tambahkan ke select option
                let option = `<option value="">--Pilih Kabupaten/Kota--</option>`
                cities.forEach(city => {
                    option += `<option id="${city.id}" value="${city.nama}">${city.nama}</option>`
                });

                citySelect.innerHTML = option
            })
            .catch(error => console.error(error));
        })

        citySelect.addEventListener('change',(e)=>{
            const id_city = e.target.selectedOptions[0].id;
            console.log(e.target);
            fetch(`https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=${id_city}`)
            .then(response => response.json())
            .then(data => {
                const districts = data.kecamatan;
                // Loop data dan tambahkan ke select option
                let option = `<option value="">--Pilih Kecamatan--</option>`
                districts.forEach(district => {
                    option += `<option id="${district.id}"value="${district.nama}">${district.nama}</option>`
                });

                districtSelect.innerHTML = option
            })
            .catch(error => console.error(error));
        })

        districtSelect.addEventListener('change',(e)=>{
            const id_district = e.target.selectedOptions[0].id;
            console.log(e.target);
            fetch(`https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=${id_district}`)
            .then(response => response.json())
            .then(data => {
                const subdistricts = data.kelurahan;
                // Loop data dan tambahkan ke select option
                let option = `<option value="">--Pilih Kelurahan/Desa--</option>`
                subdistricts.forEach(subdistrict => {
                    option += `<option id="${subdistrict.id}"value="${subdistrict.nama}">${subdistrict.nama}</option>`
                });

                subdistrictSelect.innerHTML = option
            })
            .catch(error => console.error(error));
        })
	</script>
  </body>
</html>
