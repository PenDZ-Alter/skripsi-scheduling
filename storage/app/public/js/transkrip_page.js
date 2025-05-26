// Switch between tabs
document.getElementById('tabTranskrip').addEventListener('click', function() {
    document.getElementById('cardTranskrip').style.display = 'block';
    document.getElementById('cardRiwayat').style.display = 'none';
    document.getElementById('tabTranskrip').classList.add('active');
    document.getElementById('tabRiwayatKHS').classList.remove('active');
});

document.getElementById('tabRiwayatKHS').addEventListener('click', function() {
    document.getElementById('cardTranskrip').style.display = 'none';
    document.getElementById('cardRiwayat').style.display = 'block';
    document.getElementById('tabRiwayatKHS').classList.add('active');
    document.getElementById('tabTranskrip').classList.remove('active');
});