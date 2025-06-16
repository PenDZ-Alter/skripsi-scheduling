@extends('dashboard.mahasiswa.master')

@section('content')
    <div>
        <!-- Main Content -->
        <div class="main-content fade-in-up">
            <div class="header-file">
                <a href="{{ asset('storage/files/alur_bimbingan.pdf') }}" class="btn-informasi-skripsi">
                    <i class="fa fa-download"></i>
                    Unduh alur Pengajuan, Persetujuan dan Bimbingan
                </a> <br><br>
            </div>
            <div class="content">
                <!-- Tabs for Riwayat Pengajuan and Proses Bimbingan -->
                <div class="tabs-skripsi">
                    <button class="active" id="tabRiwayat"><i class="fa fa-address-book"></i>&nbsp;Riwayat Pengajuan
                        Bimbingan</button>
                    <button id="tabProses"><i class="fa fa-book"></i>&nbsp;Proses Bimbingan</button>
                </div>

                <!-- Card for Pengajuan -->
                <div class="card" id="cardRiwayat">
                    <!-- Error message for is_ready = 0 -->
                    @if(auth()->user()->is_ready == 0)
                        <div class="alert alert-warning" id="readyWarning" style="margin-bottom: 20px; padding: 15px; background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 8px; color: #856404;">
                            <div style="display: flex; align-items: center;">
                                <i class="fa fa-exclamation-triangle" style="margin-right: 10px; color: #f39c12;"></i>
                                <div>
                                    <strong>Peringatan!</strong>
                                    <p style="margin: 5px 0 0 0;">Anda belum memenuhi syarat untuk mengajukan bimbingan. Silakan hubungi admin atau lengkapi persyaratan yang diperlukan terlebih dahulu.</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <button class="start-btn" onclick="checkReadyStatus()" 
                            @if(auth()->user()->is_ready == 0) 
                                style="opacity: 0.6; cursor: not-allowed;" 
                                title="Anda belum memenuhi syarat untuk mengajukan bimbingan"
                            @endif>
                        <i class="fa fa-plus-circle"></i>
                        Mulai Pengajuan Bimbingan
                    </button>
                    <br><br>
                    
                    <div class="card card-state" id="cardRiw">
                        <div class="empty-state">
                            <i class="fa fa-coffee"></i>
                            &nbsp;Belum Ada Pengajuan
                        </div>
                    </div>
                </div>

                <!-- Card for Proses Bimbingan -->
                <div class="process-card card-state" id="cardProses" style="display:none;">
                    <div class="card">
                        @if (isset($skripsi) && $skripsi)
                            <!-- Tampilan ketika ada data skripsi -->
                            <div class="bimbingan-info">
                                <div class="info-header">
                                    <h3><i class="fa fa-graduation-cap"></i> Status Sidang Skripsi</h3>
                                    <span class="status-badge status-{{ strtolower($skripsi->status) }}">
                                        {{ ucfirst($skripsi->status) }}
                                    </span>
                                </div>

                                <div class="student-info-card">
                                    <div class="info-row">
                                        <div class="info-label">
                                            <i class="fa fa-user"></i>
                                            <strong>Nama Mahasiswa:</strong>
                                        </div>
                                        <div class="info-value">{{ $skripsi->mahasiswa->name }}
                                        </div>
                                    </div>

                                    <div class="info-row">
                                        <div class="info-label">
                                            <i class="fa fa-book"></i>
                                            <strong>Judul:</strong>
                                        </div>
                                        <div class="info-value">{{ $skripsi->judul }}</div>
                                    </div>

                                    <div class="info-row">
                                        <div class="info-label">
                                            <i class="fa fa-user-tie"></i>
                                            <strong>Dosen Pembimbing 1:</strong>
                                        </div>
                                        <div class="info-value">{{ $skripsi->pembimbing1->name ?? 'Belum ditentukan' }}
                                        </div>
                                    </div>

                                    <div class="info-row">
                                        <div class="info-label">
                                            <i class="fa fa-user-tie"></i>
                                            <strong>Dosen Pembimbing 2:</strong>
                                        </div>
                                        <div class="info-value">{{ $skripsi->pembimbing2->name ?? 'Belum ditentukan' }}
                                        </div>
                                    </div>

                                    @if ($skripsi->ruang)
                                        <div class="info-row">
                                            <div class="info-label">
                                                <i class="fa fa-building"></i>
                                                <strong>Ruang Sidang:</strong>
                                            </div>
                                            <div class="info-value">
                                                {{ $skripsi->ruang->nama_ruang ?? ($skripsi->ruang->nama_ruang ?? 'Belum ditentukan') }}
                                            </div>
                                        </div>
                                    @endif

                                    @if ($skripsi->jadwal_mulai)
                                        <div class="info-row">
                                            <div class="info-label">
                                                <i class="fa fa-calendar"></i>
                                                <strong>Jadwal Sidang:</strong>
                                            </div>
                                            <div class="info-value">
                                                {{ $skripsi->jadwal_mulai->format('d F Y, H:i') }} -
                                                {{ $skripsi->jadwal_selesai->format('H:i') }} WIB
                                            </div>
                                        </div>
                                    @endif

                                    <div class="info-row">
                                        <div class="info-label">
                                            <i class="fa fa-clock"></i>
                                            <strong>Tanggal Pengajuan:</strong>
                                        </div>
                                        <div class="info-value">{{ $skripsi->created_at->format('d F Y, H:i') }} WIB</div>
                                    </div>
                                </div>

                                @if ($skripsi->status == 'terjadwal')
                                    <div class="action-buttons">
                                        <button class="btn btn-primary" onclick="viewScheduleDetail()">
                                            <i class="fa fa-calendar-check"></i>
                                            Detail Jadwal
                                        </button>
                                        <button class="btn btn-secondary" onclick="downloadSurat()">
                                            <i class="fa fa-download"></i>
                                            Unduh Surat
                                        </button>
                                    </div>
                                @elseif($skripsi->status == 'pending')
                                    <div class="pending-message">
                                        <i class="fa fa-clock"></i>
                                        <p>Pengajuan sidang Anda sedang diproses oleh admin. Jadwal akan ditentukan dalam
                                            1-3 hari kerja.</p>
                                    </div>
                                @elseif($skripsi->status == 'selesai')
                                    <div class="success-message">
                                        <i class="fa fa-check-circle"></i>
                                        <p>Selamat! Sidang skripsi Anda telah selesai dilaksanakan.</p>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- Tampilan default ketika belum ada pengajuan -->
                            <div class="empty-state">
                                <i class="fa fa-coffee"></i>
                                &nbsp;Anda belum mengajukan sidang Skripsi/Tesis/Disertasi
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div style="padding-bottom: 2rem;"></div>
        </div>

        <!-- Modal for Pengajuan Skripsi -->
        <div class="modal" id="modal">
            <div class="modal-content fade-in-up">
                <button class="close-icon" onclick="closeModal()" aria-label="Close modal">
                    ✕
                </button>
                <h3>Pengajuan Skripsi/Tesis/Disertasi</h3>
                <p class="subtitle">Lengkapi formulir untuk mengajukan proposal penelitian Anda</p>
                <form id="formSkripsi" action="{{ route('skripsi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="form-group">
                        <label for="judul">
                            <span class="label-icon">📋</span>
                            Judul Tugas Akhir
                        </label>
                        <div class="input-wrapper">
                            <input type="text" id="judul" name="judul"
                                placeholder="Masukkan judul dengan huruf kapital" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">
                            <span class="label-icon">📝</span>
                            Deskripsi Tugas Akhir
                        </label>
                        <div class="input-wrapper">
                            <input type="text" id="deskripsi" name="deskripsi"
                                placeholder="Berikan gambaran singkat tentang penelitian Anda">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dosen1">
                            <span class="label-icon">👨‍🏫</span>
                            Dosen Pembimbing 1
                        </label>
                        <div class="input-wrapper">
                            <select id="dosen1" name="dosen_pembimbing_1" required>
                                <option value="" disabled selected>Pilih Pembimbing Utama</option>
                                @foreach ($dosen as $da)
                                    <option value="{{ $da['id'] }}">{{ $da['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dosen2">
                            <span class="label-icon">👩‍🏫</span>
                            Dosen Pembimbing 2
                        </label>
                        <div class="input-wrapper">
                            <select id="dosen2" name="dosen_pembimbing_2" required>
                                <option value="" disabled selected>Pilih Pembimbing Kedua</option>
                                @foreach ($dosen as $db)
                                    <option value="{{ $db['id'] }}">{{ $db['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-cancel" onclick="closeModalSkripsi()">
                            <i class="fas fa-trash"></i>
                            Cancel
                        </button>
                        <button type="button" class="btn btn-save" onclick="saveDataSkripsi()">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Check ready status before opening modal
        function checkReadyStatus() {
            const isReady = {{ auth()->user()->is_ready ?? 0 }};
            
            if (isReady === 0) {
                // Show error alert with better styling
                showErrorAlert();
                return;
            }
            
            // If ready, open modal normally
            openModalSkripsi();
        }

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

        // Fungsi tambahan untuk action buttons
        function viewScheduleDetail() {
            // Implementasi untuk melihat detail jadwal
            alert('Detail jadwal sidang akan ditampilkan di sini');
        }

        function downloadSurat() {
            // Implementasi untuk download surat
            alert('Fitur download surat akan segera tersedia!');
        }

        document.addEventListener("DOMContentLoaded", function() {
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
    </script>
@endsection