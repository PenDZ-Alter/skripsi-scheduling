// Open modal
function openModalSkripsi() {
    document.getElementById('modal').style.display = 'flex';
}

// Close modal
function closeModalSkripsi() {
    document.getElementById('modal').style.display = 'none';
}

// Simpan data (contoh fungsi)
function saveDataSkripsi() {
    const judul = document.getElementById('judul').value;
    const deskripsi = document.getElementById('deskripsi').value;
    const dosen1 = document.getElementById('dosen1').value;
    const dosen2 = document.getElementById('dosen2').value;

    console.log(`Judul: ${judul}`);
    console.log(`Deskripsi: ${deskripsi}`);
    console.log(`Dosen Pembimbing 1: ${dosen1}`);
    console.log(`Dosen Pembimbing 2: ${dosen2}`);

    // Close modal after save
    closeModal();
}

// Switch between tabs
document.getElementById('tabRiwayat').addEventListener('click', function () {
    document.getElementById('cardRiwayat').style.display = 'block';
    document.getElementById('cardProses').style.display = 'none';
    document.getElementById('tabRiwayat').classList.add('active');
    document.getElementById('tabProses').classList.remove('active');
});

document.getElementById('tabProses').addEventListener('click', function () {
    document.getElementById('cardRiwayat').style.display = 'none';
    document.getElementById('cardProses').style.display = 'block';
    document.getElementById('tabProses').classList.add('active');
    document.getElementById('tabRiwayat').classList.remove('active');
});

document.addEventListener("DOMContentLoaded", function () {
        const dosen1Select = document.getElementById("dosen1");
        const dosen2Select = document.getElementById("dosen2");

        function updateOptions() {
            const selectedDosen1 = dosen1Select.value;
            const selectedDosen2 = dosen2Select.value;

            // Reset semua disabled dulu
            Array.from(dosen1Select.options).forEach(option => {
                option.disabled = false;
                if (option.value === selectedDosen2 && selectedDosen2 !== "") {
                    option.disabled = true;
                }
            });

            Array.from(dosen2Select.options).forEach(option => {
                option.disabled = false;
                if (option.value === selectedDosen1 && selectedDosen1 !== "") {
                    option.disabled = true;
                }
            });
        }

        // Trigger update saat salah satu dropdown berubah
        dosen1Select.addEventListener("change", updateOptions);
        dosen2Select.addEventListener("change", updateOptions);
    });