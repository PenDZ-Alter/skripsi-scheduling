@extends('dashboard.master')

@section('content')

<div class="container">
    <!-- Main Content -->
    <div class="main-content">
        
        <div class="content">
            <h3>Riwayat Pengajuan Bimbingan</h3>

            <!-- Tabs for Riwayat Pengajuan and Proses Bimbingan -->
            <div class="tabs">
                <button class="active" id="tabRiwayat">Riwayat Pengajuan Bimbingan</button>
                <button id="tabProses">Proses Bimbingan</button>
            </div>

            <!-- Card for Pengajuan -->
            <div class="card" id="cardRiwayat">
                <button class="start-btn" onclick="openModal()">Mulai Pengajuan Bimbingan</button>
                <div class="empty-state">
                    <i class="fa fa-laptop"></i>
                    <p>Belum Ada Pengajuan</p>
                </div>
            </div>

            <!-- Card for Proses Bimbingan -->
            <div class="process-card" id="cardProses" style="display:none;">
                <h4>Proses Bimbingan</h4>
                <p>Informasi terkait Proses Bimbingan akan ditampilkan di sini.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Pengajuan Skripsi -->
<div class="modal" id="modal">
    <div class="modal-content">
        <h3>Pengajuan Skripsi/Tesis/Disertasi</h3>
        <label for="judul">Judul Tugas Akhir</label>
        <input type="text" id="judul" placeholder="Tulis dengan huruf kapital">

        <label for="deskripsi">Deskripsi Tugas Akhir</label>
        <input type="text" id="deskripsi" placeholder="Deskripsi tugas akhir">

        <label for="dosen1">Dosen Pembimbing 1</label>
        <select id="dosen1">
            <option value="">Pilih Pembimbing 1</option>
            <option value="dosen1">Dosen 1</option>
            <option value="dosen2">Dosen 2</option>
        </select>

        <label for="dosen2">Dosen Pembimbing 2</label>
        <select id="dosen2">
            <option value="">Pilih Pembimbing 2</option>
            <option value="dosen1">Dosen 1</option>
            <option value="dosen2">Dosen 2</option>
        </select>

        <div>
            <button class="close-btn" onclick="closeModal()">Batal</button>
            <button class="close-btn" onclick="saveData()">Simpan</button>
        </div>
    </div>
</div>

@endsection