// Open modal
function openModalSkripsi() {
    document.getElementById('modal').style.display = 'flex';
}

// Close modal
function closeModalSkripsi() {
    document.getElementById('modal').style.display = 'none';
}

// Simpan data 
function saveDataSkripsi() {
    const judul = document.getElementById("judul").value.trim();
    const deskripsi = document.getElementById("deskripsi").value.trim();
    const dosen1Select = document.getElementById("dosen1");
    const dosen2Select = document.getElementById("dosen2");

    const dosen1 = dosen1Select.options[dosen1Select.selectedIndex]?.text || "-";
    const dosen2 = dosen2Select.options[dosen2Select.selectedIndex]?.text || "-";

    if (!judul || !deskripsi || !dosen1Select.value || !dosen2Select.value) {
        alert("Lengkapi semua field terlebih dahulu!");
        return;
    }

    // Update tampilan container
    const card = document.getElementById("cardRiw");
    card.innerHTML = `
        <div class="filled-state">
            <h4>📌 ${judul}</h4>
            <p><strong>Deskripsi:</strong> ${deskripsi}</p>
            <p><strong>Dosen Pembimbing 1:</strong> ${dosen1}</p>
            <p><strong>Dosen Pembimbing 2:</strong> ${dosen2}</p>
        </div>
    `;

    // Tutup modal
    closeModalSkripsi();

    // Submit form
    document.getElementById("formSkripsi").submit();

    // Reset form (optional)
    document.getElementById("judul").value = "";
    document.getElementById("deskripsi").value = "";
    dosen1Select.selectedIndex = 0;
    dosen2Select.selectedIndex = 0;

    // Reset disabled state
    Array.from(dosen1Select.options).forEach(opt => opt.disabled = false);
    Array.from(dosen2Select.options).forEach(opt => opt.disabled = false);

    // ⚠️ Deskripsi hanya digunakan untuk UI, tidak dikirim ke backend
}

// Switch between tabs
document.getElementById('tabRiwayat').addEventListener('click', function() {
    document.getElementById('cardRiwayat').style.display = 'block';
    document.getElementById('cardProses').style.display = 'none';
    document.getElementById('tabRiwayat').classList.add('active');
    document.getElementById('tabProses').classList.remove('active');
});

document.getElementById('tabProses').addEventListener('click', function() {
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