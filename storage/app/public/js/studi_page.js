// Switch between tabs
document.getElementById('tabTranskrip').addEventListener('click', function () {
    document.getElementById('cardTranskrip').classList.add('active');
    document.getElementById('cardRiwayat').classList.remove('active');
    this.classList.add('active');
    document.getElementById('tabRiwayatKHS').classList.remove('active');
});

document.getElementById('tabRiwayatKHS').addEventListener('click', function () {
    document.getElementById('cardTranskrip').classList.remove('active');
    document.getElementById('cardRiwayat').classList.add('active');
    this.classList.add('active');
    document.getElementById('tabTranskrip').classList.remove('active');
});

document.querySelectorAll("*").forEach(el => {
    const style = getComputedStyle(el);
    if (style.backgroundColor.includes("oklch")) {
        el.style.backgroundColor = "#007bff"; // ganti ke RGB/HEX yang didukung
    }
});

function downloadPDF() {
    const {
        jsPDF
    } = window.jspdf;
    const doc = new jsPDF();
    doc.autoTable({
        html: '#khsTable'
    });
    doc.save("KHS_Mahasiswa.pdf");
}