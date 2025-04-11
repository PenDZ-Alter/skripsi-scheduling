@extends('dashboard.master')

@section('content')
    <div class="student-page-card">
        <!-- Background image -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/img/Background.jpeg') }}" alt="Background"
                class="grayscale background-Image">
        </div>

        <!-- Konten -->
        <div class="grid-cols-1 md:grid-cols-2 content-Card">
            <!-- Kolom Kiri: Info Profil -->
            <div class="space-x-4 card-Profile">
                <!-- Pembungkus foto dan icon -->
                <div class="profile-wrapper">
                    <!-- Foto profil -->
                    <div class="profile-Image-background">
                        <img class="min-w-1 min-h-0.5" id="profileImage" src="{{ asset('storage/img/Alfariz.png') }}"
                            alt="Foto Profil" class="profile-image">

                        <!-- Ikon kamera -->
                        <div class="camera-fix" onclick="document.getElementById('uploadInput').click();">
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

                <!-- Info Profile -->
                <div class="info-profile">
                    <h3 class="judul-text">Info Profil & Email UIN, Klik
                        <a href="#" class="link-profile"><u>Di SINI</u></a>
                    </h3>
                    <p class="text-pertama"> - Default password email sesuai siakad</p>
                    <p class="text-kedua"> - Ubah password email, klik
                        <a href="#" target="_blank" class="link-ubahPassword">Di SINI</a>
                    </p>
                    <p class="text-ketiga"> - Buka email UIN, klik
                        <a href="#" target="_blank" class="link-Email">gmail.com</a>
                    </p>
                    <p class="text-keempat"> Add account:
                        <i class="paragraf-Email">NIM</i>@student.uin-malang.ac.id
                    </p>
                    <p class="text-kelima"> - Untuk aktivasi email UIN, klik
                        <a href="#" target="_blank" class="link-aktivasiEmail">Di SINI</a>
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Free Access Journal -->
            <div>
                <h3 class="title-Link">Free Access Journal</h3>
                <div class="space-y-2">
                    <a href="https://link.springer.com/" class="link-springer">
                        Free Access Link Springer <span class="first-laquo">&laquo;</span>
                    </a>
                    <a href="https://www.emerald.com/insight/" class="link-emerald">
                        Free Access Emerald Insight <span class="second-laquo">&laquo;</span>
                    </a>
                    <a href="https://www.cambridge.org/core/" class="link-cambridge">
                        Free Access Cambridge Core <span class="third-laquo">&laquo;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
