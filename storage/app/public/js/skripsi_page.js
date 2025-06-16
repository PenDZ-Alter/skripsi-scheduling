// Show custom error alert
function showErrorAlert() {
    // Create custom alert div if it doesn't exist
    let existingAlert = document.getElementById('customErrorAlert');
    if (existingAlert) {
        existingAlert.remove();
    }

    const alertDiv = document.createElement('div');
    alertDiv.id = 'customErrorAlert';
    alertDiv.innerHTML = `
                <div style="
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
                    color: white;
                    padding: 20px;
                    border-radius: 12px;
                    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
                    z-index: 10000;
                    max-width: 400px;
                    animation: slideInRight 0.3s ease-out;
                ">
                    <div style="display: flex; align-items: center;">
                        <i class="fa fa-exclamation-circle" style="font-size: 24px; margin-right: 15px;"></i>
                        <div style="flex: 1;">
                            <h4 style="margin: 0 0 8px 0; font-size: 16px;">Akses Ditolak!</h4>
                            <p style="margin: 0; font-size: 14px; opacity: 0.9;">
                                Anda belum memenuhi persyaratan untuk mengajukan bimbingan. 
                                Silakan hubungi admin untuk informasi lebih lanjut.
                            </p>
                        </div>
                        <button onclick="closeErrorAlert()" style="
                            background: none;
                            border: none;
                            color: white;
                            font-size: 20px;
                            cursor: pointer;
                            margin-left: 10px;
                            opacity: 0.8;
                        ">×</button>
                    </div>
                </div>
                <style>
                    @keyframes slideInRight {
                        from {
                            transform: translateX(100%);
                            opacity: 0;
                        }
                        to {
                            transform: translateX(0);
                            opacity: 1;
                        }
                    }
                </style>
            `;

    document.body.appendChild(alertDiv);

    // Auto close after 5 seconds
    setTimeout(() => {
        closeErrorAlert();
    }, 5000);
}

// Close error alert
function closeErrorAlert() {
    const alertDiv = document.getElementById('customErrorAlert');
    if (alertDiv) {
        alertDiv.style.animation = 'slideInRight 0.3s ease-out reverse';
        setTimeout(() => {
            alertDiv.remove();
        }, 300);
    }
}

// Open modal (original function)
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

// Fungsi tambahan untuk action buttons
function viewScheduleDetail() {
    // Implementasi untuk melihat detail jadwal
    alert('Detail jadwal sidang akan ditampilkan di sini');
}

function downloadSurat() {
    // Implementasi untuk download surat
    alert('Fitur download surat akan segera tersedia!');
}

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