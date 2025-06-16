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
                        Sidang</button>
                    <button id="tabProses"><i class="fa fa-book"></i>&nbsp;Proses Sidang</button>
                </div>

                <!-- Card for Pengajuan -->
                <div class="card" id="cardRiwayat">
                    <!-- Error message for is_ready = 0 -->
                    @if (auth()->user()->is_ready == 0)
                        <div class="alert alert-warning error-message" id="readyWarning">
                            <div style="display: flex; align-items: center;">
                                <i class="fa fa-exclamation-triangle" style="margin-right: 10px; color: #f39c12;"></i>
                                <div>
                                    <strong style="text-align: center;">Peringatan!</strong>
                                    <p style="margin: 5px 0 0 0;">Anda belum memenuhi syarat untuk mengajukan sidang.
                                        Silakan hubungi admin atau lengkapi persyaratan yang diperlukan terlebih dahulu.</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!isset($skripsi) && !$skripsi)
                    <button class="start-btn" onclick="checkReadyStatus()"
                        @if (auth()->user()->is_ready == 0) style="opacity: 0.6; cursor: not-allowed;" 
                                title="Anda belum memenuhi syarat untuk mengajukan bimbingan" @endif>
                        <i class="fa fa-plus-circle"></i>
                        Mulai Pengajuan Sidang
                    </button>
                    <br><br>
                    @endif

                    @if(isset($skripsi) && $skripsi)
                    <div class="card card-state" id="cardRiwDone">
                        <div class="done-state">
                            <i class="fa fa-coffee"></i>
                            &nbsp;Sudah melakukan pengajuan
                        </div>
                    </div>
                    @else
                    <div class="card card-state" id="cardRiw">
                        <div class="empty-state">
                            <i class="fa fa-coffee"></i>
                            &nbsp;Belum Ada Pengajuan
                        </div>
                    </div>
                    @endif
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
                <button class="close-icon" onclick="closeModalSkripsi()" aria-label="Close modal">
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
    </script>
@endsection
