@extends('dashboard.mahasiswa.master')

@section('content')
    <!-- Grid 2 Kolom -->
    <div class="profile-page-card-edit fade-in-up">
        <!-- Konten -->
        <div class="grid-cols-1 md:grid-cols-4 content-Card-profile">
            <!-- Kolom Kiri: Info Profil -->
            <div class="space-x-4 card-Profile">
                <!-- Pembungkus foto dan icon -->
                <div class="profile-wrapper-page">
                    <!-- Foto profil -->
                    <div class="profile-Image-background-page">
                        <img class="min-w-1 min-h-0.5" id="profileImage" src="{{ asset('storage/img/Alfariz.png') }}"
                            alt="Foto Profil" class="profile-image-page">

                        <!-- Ikon kamera -->
                        <div class="camera-fix-profile" onclick="document.getElementById('uploadInput').click();">
                            <img src="{{ asset('storage/img/camera-fix.png') }}" alt="Camera Icon">
                        </div>
                    </div>


                    <!-- Input file untuk unggah -->
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <input id="uploadInput" name="photo" type="file" class="hidden" accept="image/*"
                            onchange="previewAndUploadImage()">
                    </form>
                </div>

                <div class="info-box-profiles">
                    <div class="space-y-2">
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Angkatan</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                2022
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>NIM</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['id'] }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Nama Mahasiswa</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['name'] }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Status Studi</span>
                            </div>
                            <div class="col-9 value-profile border-bottom-indicator">
                                <span class="status-indicator-profile"></span>
                                <span class="beside-status-profile">Mahasiswa Aktif</span>
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Semester</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                VI (Enam)
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Tempat Lahir</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['tempat_lahir'] }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Tanggal Lahir</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['tanggal_lahir'] }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Email Pribadi</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['email'] }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Alamat</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['alamat'] }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Nama Orang Tua</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['nama_ortu'] }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Alamat Orang Tua</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user['domisili_ortu'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Tombol Edit -->
                <div class="bg-btn-profile-edit">
                    <div class="space-y-2">
                        <a href="{{ url('/profile') }}" class="btn-edit-profile-page">
                            <i class="fas fa-save" class="btn-pen-edit"></i>
                            <span class="btn-text-edit">Simpan Profil Saya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div style="padding-bottom: 3rem;">
    </div>
    <script type="text/javascript" src="storage/js/profilePage.js"></script>
@endsection
