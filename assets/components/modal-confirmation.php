<div id="confirm-modal" class="modal">
    <div class="modal-content">
        <h2>Pesan Konfirmasi</h2>
        <p>Pastikan data yang anda masukkan sudah benar.</p>
        <p>Data yang sudah disimpan tidak akan bisa diedit kembali.</p>
        <p>Apakah anda yakin datanya sudah benar?</p>
        <button id="confirm-btn">Yes</button>
        <button id="cancel-btn">Cancel</button>
    </div>
</div>

<script>
    const submitBtn = document.getElementById('submit-btn');
    const confirmBtn = document.getElementById('confirm-btn');
    const cancelBtn = document.getElementById('cancel-btn');

    submitBtn.addEventListener('click', function(e) {
        e.preventDefault(); // menghentikan default submit behavior
        if(!cekInputKosong()){
            const modal = document.getElementById('confirm-modal');
            modal.style.display = 'block'; // menampilkan modal box
        }
    });

    confirmBtn.addEventListener('click', function() {
        // lanjutkan dengan submit form
        document.getElementById('my-form').submit();
    });

    cancelBtn.addEventListener('click', function() {
        const modal = document.getElementById('confirm-modal');
        modal.style.display = 'none'; // sembunyikan modal box
    });

    const toastError = (input) => {
        return HTML = `<div class="toast">
                        <div class="toast-header">
                            <strong class="mr-auto">Input Error</strong>
                            </button>
                        </div>
                        <div class="toast-body">
                            Input ${input} masih kosong!!
                        </div>
                    </div>`
    }

    const toastErrorMessage = (input, message) => {
        return HTML = `<div class="toast">
                        <div class="toast-header">
                            <strong class="mr-auto">Input Error</strong>
                            </button>
                        </div>
                        <div class="toast-body">
                            Input ${input} ${message}!!
                        </div>
                    </div>`
    }


</script>