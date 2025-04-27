@extends('dashboard.master')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    .container {
        display: flex;
        height: 100vh;
    }

    .menu ul {
        list-style: none;
        padding: 0;
    }

    .menu li a {
        color: white;
        text-decoration: none;
        padding: 12px 20px;
        display: block;
        margin-bottom: 5px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .menu li a:hover {
        background-color: #4f5b62;
    }

    .menu li a.active {
        background-color: #ff9b00;
        color: white;
    }

    .footer {
        text-align: center;
        margin-top: 20px;
        font-size: 12px;
        color: #bbb;
    }

    /* Main content styling */
    .main-content {
        flex: 1;
        border-radius: 15px;
        padding: 0px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    .header h2 {
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }

    .user-info {
        font-size: 16px;
        font-weight: bold;
        color: #555;
    }

    .user-info span {
        display: block;
    }

    .help-btn,
    .guide-btn {
        background-color: #ff9b00;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
        margin-left: 10px;
        transition: background-color 0.3s;
    }

    .help-btn:hover,
    .guide-btn:hover {
        background-color: #ff7f00;
    }

    .content {
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .modal-content {
        background-color: white;
        padding: 25px;
        border-radius: 15px;
        width: 450px;
        max-width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .modal-content h3 {
        font-size: 18px;
        margin-bottom: 15px;
        text-align: center;
    }

    .modal-content label {
        font-size: 14px;
        display: block;
        margin-bottom: 5px;
    }

    .modal-content input,
    .modal-content select {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    .modal-content button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        margin-top: 10px;
    }

    .modal-content button:hover {
        background-color: #0056b3;
    }

    .close-btn {
        background-color: #ccc;
        color: black;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
    }

    .close-btn:hover {
        background-color: #aaa;
    }

    /* Button Styling */
    .start-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
    }

    .start-btn:hover {
        background-color: #0056b3;
    }

    /* Tabs Styling */
    .tabs {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 2px solid #dee2e6;
    }

    .tabs button {
        background-color: transparent;
        border: none;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        color: #007bff;
    }

    .tabs button.active {
        font-weight: bold;
        border-bottom: 2px solid #007bff;
    }

    /* Process Bimbingan Section */
    .process-card {
        background-color: #e9ecef;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
</style>

<div class="container">
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="user-info">
                <span>Alfariz Muhan M</span>
                <span>220605110001</span>
            </div>
            <div>
                <button class="help-btn">Help</button>
                <button class="guide-btn">Panduan</button>
            </div>
        </div>
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