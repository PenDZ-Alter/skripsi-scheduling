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
                    <button class="start-btn" onclick="openModal()">
                        <i class="fa fa-plus-circle"></i>
                        Mulai Pengajuan Bimbingan</button>
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
                        <div class="empty-state">
                            <i class="fa fa-coffee"></i>
                            &nbsp;Anda belum mengajukan bimbingan Skripsi/Tesis/Disertasi atau pengajuan Anda belum
                            disetujui
                        </div>
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
                <form>
                    <div class="form-group">
                        <label for="judul">
                            <span class="label-icon">📋</span>
                            Judul Tugas Akhir
                        </label>
                        <div class="input-wrapper">
                            <input type="text" id="judul" placeholder="Masukkan judul dengan huruf kapital">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">
                            <span class="label-icon">📝</span>
                            Deskripsi Tugas Akhir
                        </label>
                        <div class="input-wrapper">
                            <input type="text" id="deskripsi"
                                placeholder="Berikan gambaran singkat tentang penelitian Anda">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dosen1">
                            <span class="label-icon">👨‍🏫</span>
                            Dosen Pembimbing 1
                        </label>
                        <div class="input-wrapper">
                            <select id="dosen1" name="dosen1">
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
                            <select id="dosen2" name="dosen2">
                                <option value="" disabled selected>Pilih Pembimbing Kedua</option>
                                @foreach ($dosen as $db)
                                    <option value="{{ $db['id'] }}">{{ $db['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-cancel" onclick="closeModal()">
                            <i class="fas fa-trash"></i>
                            Cancel
                        </button>
                        <button type="button" class="btn btn-save" onclick="saveData()">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
