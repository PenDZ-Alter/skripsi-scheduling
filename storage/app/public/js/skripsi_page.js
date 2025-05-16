 // Open modal
 function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

// Close modal
function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

// Simpan data (contoh fungsi)
function saveData() {
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
document.getElementById('tabTranskrip').addEventListener('click', function() {
    document.getElementById('cardTranskrip').classList.add('active');
    document.getElementById('cardRiwayat').classList.remove('active');
    this.classList.add('active');
    document.getElementById('tabRiwayatKHS').classList.remove('active');
});

document.getElementById('tabRiwayatKHS').addEventListener('click', function() {
    document.getElementById('cardTranskrip').classList.remove('active');
    document.getElementById('cardRiwayat').classList.add('active');
    this.classList.add('active');
    document.getElementById('tabTranskrip').classList.remove('active');
});