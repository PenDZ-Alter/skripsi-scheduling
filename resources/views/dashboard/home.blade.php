@extends('dashboard.master')

@section('content')
    <!-- Grid 2 Kolom -->
    <div style="background-color: #FFFFFF; box-shadow: 0px 8px 6px rgba(0, 0, 0, 0.15);" class="p-6 rounded-md relative">
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

                    {{-- <!-- Modal Konfirmasi -->
                    <div id="confirmModal"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                        <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-md p-6 border-t-4 border-purple-600">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Foto Profil</h2>
                            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin memilih gambar ini sebagai foto profil
                                Anda?</p>
                            <div class="flex justify-end space-x-3">
                                <button onclick="cancelImageSelection()"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-4 py-2 rounded">Batal</button>
                                <button onclick="confirmImageSelection()"
                                    class="bg-purple-600 hover:bg-purple-700 text-white font-medium px-4 py-2 rounded">Ya,
                                    Pilih</button>
                            </div>
                        </div>
                    </div> --}}

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

    <div class="Card">
        <div class="card-Chart">
            <!-- 📊 Grafik Indeks Prestasi -->
            <div id="grafikContainer" class="chart-IP">
                <!-- Tombol Ekspor -->
                <div class="top-2 right-2 dropdown-button">
                    <div id="dropdownButton" class="dropdown-menu" onclick="toggleDropdown()">
                        ☰
                    </div>
                    <ul id="exportMenu" class="hidden export-menu">
                        <li><a href="#" id="downloadPNG" class="menu-item">Download PNG</a></li>
                        <li><a href="#" id="downloadJPEG" class="menu-item">Download JPEG</a></li>
                        <li><a href="#" id="downloadPDF" class="menu-item">Download PDF</a></li>
                    </ul>
                </div>

                <!-- Judul -->
                <h3 class="chart-IP-text">Grafik Indeks Prestasi</h3>
                <p class="mahasiswa-Information">
                    220605110025 - <span class="mahasiswa-Name">ALFARIZ MUHAN MANDEGA</span>
                </p>
                <canvas id="grafikIP" height="110" width="auto"></canvas>
            </div>

            <!-- 🖼️ Area Gambar dengan Swiper -->
            <div class="card-Swiper">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="https://hes.uin-malang.ac.id/wp-content/uploads/2022/12/Sertifikat-dan-SK-BAN-PT-Akreditasi-Prodi-HES-6-Desember-2022-sd-2027.pdf"
                                target="_blank" class="Image1">
                                <img src="{{ asset('storage/img/Berita1.jpeg') }}"
                                    class="Image1-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://id.quora.com/Apa-penyesalanmu-selama-kuliah" target="_blank" class="Image2">
                                <img src="{{ asset('storage/img/Berita2.png') }}"
                                    class="Image2-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSf04cEpb6v-44beFfiPUwthljHggOcefmBtow0PyJu7uOwd3A/viewform?pli=1"
                                target="_blank" class="Image3">
                                <img src="{{ asset('storage/img/Berita3.png') }}"
                                    class="Image3-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://www.instagram.com/kemendukbangga_bkkbn/" target="_blank" class="Image4">
                                <img src="{{ asset('storage/img/Berita4.jpg') }}"
                                    class="Image4-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://www.instagram.com/simfonifmmalang/p/C3PzBgYPnSK/" target="_blank"
                                class="Image5">
                                <img src="{{ asset('storage/img/Berita5.jpeg') }}"
                                    class="Image5-Style" />
                            </a>
                        </div>
                    </div>

                    <!-- Tombol Navigasi -->
                    <div style="color:#FFFFFF !important;" class="swiper-button-prev"></div>
                    <div style="color:#FFFFFF !important;" class="swiper-button-next"></div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid 2 Kolom untuk Data Akademik & Jadwal Kuliah -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <!-- Card Data Akademik -->
        <div class="student-info">
            <div class="info-box">
                <div class="space-y-2">
                    <div class="row mb-2">
                        <div class="col-3 label">
                            <span class="font-semibold">NIM</span>
                        </div>
                        <div class="col-9 value border-bottom">
                            220605110025
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 label">
                            <span class="font-semibold">Status Studi</span>
                        </div>
                        <div class="col-9 value border-bottom d-flex align-items-center">
                            <span class="status-indicator"></span> <span class="beside-status">Mahasiswa Aktif</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 label">
                            <span class="font-semibold">Jurusan</span>
                        </div>
                        <div class="col-9 value border-bottom">
                            S1 TEKNIK INFORMATIKA
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 label">
                            <span class="font-semibold">Akreditasi</span>
                        </div>
                        <div class="col-9 value border-bottom">
                            Unggul (040/SK/LAM-INFOKOM/Ak/S/III/2024)
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 label">
                            <span class="font-semibold">Dosen Wali</span>
                        </div>
                        <div class="col-9 value border-bottom">
                            Dr. Zainal Abidin M.Kom
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 label">
                            <span class="font-semibold">Semester</span>
                        </div>
                        <div class="col-9 value border-bottom">
                            VI (Enam)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Jadwal Kuliah -->
        <div style="box-shadow: 0px 8px 6px rgba(0, 0, 0, 0.15);" class="bg-white p-4 rounded-md shadow">
            <h3 class="text-lg font-bold mb-2">Jadwal Kuliahmu Hari Ini</h3>
            <i>
                <p class="text-gray-500">Tidak Ada Jadwal Kuliah, saatnya kamu eksplorasi pengalaman baru</p>
            </i>
        </div>
    </div>

    <!-- Quotes -->
    <div style="box-shadow: 0px 8px 6px rgba(0, 0, 0, 0.15);" class="mt-4 bg-white p-4 rounded-md shadow">
        <blockquote class="italic text-gray-600">"Lelah hadir untuk menjadi pengingat seberapa besar perjuanganmu. Kalau
            kamu lelah, rehat sejenak."</blockquote>
        <span class="text-sm text-gray-500">Positive Quotes</span>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endsection
