@extends('dashboard.mahasiswa.master')

@section('content')
    <!-- Greet Card -->
    <div class="greeting-card fade-in-up">
        <h2>Hai, {{ $user['name'] }} 👋</h2>
        <p><i>Semangat menuntaskan semester ini, semoga IPK-nya naik terus ya!</i></p>
        <br>
        <h2>Nih Akses gampang buat kamu explore!</h2>
        <div class="quick-access">
            <a href="{{ route('mhs.studi') }}" class="quick-btn">📝 KRS</a>
            <a href="{{ route('mhs.transkrip') }}" class="quick-btn">📄 Transkrip</a>
            <a href="{{ route('mhs.skripsi') }}" class="quick-btn">📅 Jadwal</a>
        </div>
    </div>

    <!-- Grid 2 Kolom -->
    <div class="profile-card fade-in-up">
        <!-- Background image -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/img/Background.jpeg') }}" alt="Background" class="grayscale background-Image">
        </div>

        <!-- Konten -->
        <div class="grid-cols-1 md:grid-cols-2 content-Card">
            <!-- Kolom Kiri: Info Profil -->
            <div class="space-x-4 card-Profile">
                <!-- Pembungkus foto dan icon -->
                <div class="profile-wrapper">
                    <!-- Foto profil -->
                    <div class="profile-Image-background">
                        <a href="{{ route('mhs.profile') }}" class="profile-Image-background1"><img
                                class="min-w-1 min-h-0.5" id="profileImage" src="{{ asset('storage/img/Alfariz.png') }}"
                                alt="Foto Profil" class="profile-image"></a>

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
                        <a href="{{ url('/profileEdit') }}" class="link-profile"><u>Di SINI</u></a>
                    </h3>
                    <p class="text-pertama"> - Default password email sesuai siakad</p>
                    <p class="text-kedua"> - Ubah password email, klik
                        <a href="{{ url('/profileEdit') }}" class="link-ubahPassword">Di SINI</a>
                    </p>
                    <p class="text-ketiga"> - Buka email UIN, klik
                        <a href="{{ url('/profileEdit') }}" class="link-Email">gmail.com</a>
                    </p>
                    <p class="text-keempat"> Add account:
                        <i class="paragraf-Email">NIM</i>@student.uin-malang.ac.id
                    </p>
                    <p class="text-kelima"> - Untuk aktivasi email UIN, klik
                        <a href="{{ url('/profileEdit') }}" class="link-aktivasiEmail">Di SINI</a>
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Free Access Web -->
            <div>
                <h3 class="title-Link">Free Access Website</h3>
                <div class="space-y-2">
                    <a href="https://elearning.uin-malang.ac.id/" class="link-springer">
                        Access E-Learning UIN Malang <span class="first-laquo">&laquo;</span>
                    </a>
                    <a href="https://siam.uin-malang.ac.id/" class="link-emerald">
                        Access SIAM UIN Malang <span class="second-laquo">&laquo;</span>
                    </a>
                    <a href="https://siakad.uin-malang.ac.id/" class="link-cambridge">
                        Access SIAKAD UIN Malang <span class="third-laquo">&laquo;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik IP dan IPK -->
    <div class="Card">
        <div class="card-Chart fade-in-up">
            <!-- 📊 Grafik Indeks Prestasi -->
            <div id="grafikContainer" class="chart-IP">
                <!-- Tombol Ekspor -->
                <div class="top-2 right-2 dropdown-button">
                    <div id="dropdownButton" class="dropdown-menu" onclick="toggleDropdown()">
                        ☰
                    </div>
                    <ul id="exportMenu" class="hidden export-menu fade-in-up">
                        <li><a href="#" id="downloadPNG" class="menu-item">Download PNG</a></li>
                        <li><a href="#" id="downloadJPEG" class="menu-item">Download JPEG</a></li>
                        <li><a href="#" id="downloadPDF" class="menu-item">Download PDF</a></li>
                    </ul>
                </div>

                <!-- Judul -->
                <h3 class="chart-IP-text">Grafik Indeks Prestasi</h3>
                <p class="mahasiswa-Information">
                    {{ $user['id'] }} - <span class="mahasiswa-Name">{{ $user['name'] }}</span>
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
                                <img src="{{ asset('storage/img/Berita1.jpeg') }}" class="Image1-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://id.quora.com/Apa-penyesalanmu-selama-kuliah" target="_blank" class="Image2">
                                <img src="{{ asset('storage/img/Berita2.png') }}" class="Image2-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSf04cEpb6v-44beFfiPUwthljHggOcefmBtow0PyJu7uOwd3A/viewform?pli=1"
                                target="_blank" class="Image3">
                                <img src="{{ asset('storage/img/Berita3.png') }}" class="Image3-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://www.instagram.com/kemendukbangga_bkkbn/" target="_blank" class="Image4">
                                <img src="{{ asset('storage/img/Berita4.jpg') }}" class="Image4-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://www.instagram.com/simfonifmmalang/p/C3PzBgYPnSK/" target="_blank"
                                class="Image5">
                                <img src="{{ asset('storage/img/Berita5.jpeg') }}" class="Image5-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="storage/img/Berita6.jpg" target="_blank" class="Image6">
                                <img src="{{ asset('storage/img/Berita6.jpg') }}" class="Image6-Style" />
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="https://library.uin-malang.ac.id/" target="_blank" class="Image7">
                                <img src="{{ asset('storage/img/Berita7.jpg') }}" class="Image7-Style" />
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
        <div class="student-info fade-in-up">
            <div class="info-box">
                <div class="space-y-2">
                    <div class="row mb-2">
                        <div class="col-3 label">
                            <span class="font-semibold">NIM</span>
                        </div>
                        <div class="col-9 value border-bottom">
                            {{ $user['id'] }}
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
        <div class="calendar-card fade-in-up">
            <h3 class="calendar-title">
                <i class="fa-regular fa-calendar"></i> Jadwal Kuliahmu 
            </h3>
            @if (isset($skripsi) && $skripsi)
                <div class="student-info-card">
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

    <!-- Quotes -->
    <div class="background-quotes fade-in-up">
        <blockquote class="quotes-description">"Lelah hadir untuk menjadi pengingat seberapa besar perjuanganmu terhadap
            negara. Kalau
            kamu lelah, rehat sejenak."</blockquote>
        <span class="quotes-end">🌄 Positive Quotes</span>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endsection
