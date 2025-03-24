@extends('dashboard.master')

@section('content')
    <!-- Grid 2 Kolom -->
    <div style="background-color: #FFFFFF;" class="p-6 rounded-md relative overflow-hidden">
        <!-- Background image -->
        <div class="absolute inset-0 opacity-10">
            <img src="{{ asset('storage/img/Background.jpeg') }}" alt="Background" style="height: 250px; opacity: 20%"
                class="w-full h-full object-cover grayscale">
        </div>

        <!-- Konten -->
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
            <!-- Kolom Kiri: Info Profil -->
            <div class="flex items-start space-x-4">
                <!-- Foto + Icon Kamera -->
                <!-- Pembungkus foto dan icon -->
                <div class="profile-wrapper">
                    <!-- Foto profil -->
                    <div style="height: 150px; width:150px; margin-top:10px; margin-left:5px;">
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

                <!-- Info Email -->
                <div style="margin-top: 15px; margin-left: 50px;">
                    <h3 style="font-weight: 700; font-size: 1rem;">Info Profil & Email UIN, Klik
                        <a href="#" style="font-size:0.90rem; color:#2563EB;"><u>Di SINI</u></a>
                    </h3>
                    <p style="margin-top:5px;" class="text-sm font-semibold"> - Default password email sesuai siakad</p>
                    <p style="margin-top:5px;" class="text-sm font-semibold"> - Ubah password email, klik
                        <a href="#" style="color: #2563EB;">Di SINI</a>
                    </p>
                    <p style="margin-top:5px;" class="text-sm font-semibold"> - Buka email UIN, klik
                        <a href="#" style="color:#2563EB;">gmail.com</a>
                    </p>
                    <p style="margin-left: 10px;" class="text-sm font-semibold"> Add account:
                        <i style="margin-right:-1px;">NIM</i>@student.uin-malang.ac.id
                    </p>
                    <p style="margin-top:5px;" class="text-sm font-semibold"> - Untuk aktivasi email UIN, klik
                        <a href="#" style="color:#2563EB;">Di SINI</a>
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Free Access Journal -->
            <div>
                <h3 style="text-align: right; font-size: 1.3rem; font-weight: 350; color: #4B5563;" class="text-right mb-4">
                    Free Access
                    Journal</h3>
                <div class="space-y-2">
                    <a href="https://link.springer.com/"
                        style="display: block; background: linear-gradient(to right, rgba(254, 215, 170, 0.1), #fed7aa); text-align: right; font-size: 0.80rem; color: #4B5563;"
                        class="px-4 py-0.5 font-semibold rounded">
                        Free Access Link Springer <span style="font-size: 1.2rem; font-weight: 700;">&laquo;</span>
                    </a>
                    <a href="https://www.emerald.com/insight/"
                        style="display: block; background: linear-gradient(to right, rgba(190, 242, 100, 0.1), #bef264); text-align: right; font-size: 0.80rem; color: #4B5563;"
                        class="px-4 py-0.5 font-semibold rounded">
                        Free Access Emerald Insight <span style="font-size: 1.2rem; font-weight: 700;">&laquo;</span>
                    </a>
                    <a href="https://www.cambridge.org/core/"
                        style="display: block; background: linear-gradient(to right, rgba(254, 240, 138, 0.1), #fef08a); text-align: right; font-size: 0.80rem;color: #4B5563;"
                        class="px-4 py-0.5 font-semibold rounded">
                        Free Access Cambridge Core <span style="font-size: 1.2rem; font-weight: 700;">&laquo;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- 📊 Grafik IP & IPK Mahasiswa -->
    <div id="grafikContainer" class="bg-white p-4 mt-6 rounded-md shadow relative text-center">
        <!-- Tombol Ekspor -->
        <div class="absolute top-2 right-2">
            <div id="dropdownButton" style="height: 40px; width:40px; cursor: pointer; background-color:azure;"
                class="rounded flex items-center justify-center shadow hover:bg-gray-300" onclick="toggleDropdown()">
                ☰
            </div>
            <ul id="exportMenu"
                class="hidden absolute right-0 mt-1 w-48 bg-white border border-gray-200 rounded shadow-md text-sm z-10">
                <li><a href="#" id="downloadPNG" class="block px-4 py-2 hover:bg-gray-100">Download PNG</a></li>
                <li><a href="#" id="downloadJPEG" class="block px-4 py-2 hover:bg-gray-100">Download JPEG</a></li>
                <li><a href="#" id="downloadPDF" class="block px-4 py-2 hover:bg-gray-100">Download PDF</a></li>
            </ul>
        </div>

        <!-- Judul -->
        <h3 class="text-lg font-bold mb-2">Grafik Indeks Prestasi</h3>
        <p style="letter-spacing:1px; font-weight:500;" class="text-sm text-gray-600 mb-4">
            220605110025 - <span style="letter-spacing:-1px;">ALFARIZ MUHAN MANDEGA</span>
        </p>
        <canvas id="grafikIP" height="120"></canvas>
    </div>

    <!-- Grid 2 Kolom untuk Data Akademik & Jadwal Kuliah -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <!-- Card Data Akademik -->
        <div class="bg-white p-4 rounded-md shadow">
            <div class="space-y-2">
                <p><strong>NIM<span style="margin-left:5rem;">:</span></strong> <span
                        style="margin-left:5px;">220605110025</span></p>
                <p><strong>Status Studi<span style="margin-left:23px;">:</span></strong> <span
                        style="margin-left:5px;">Mahasiswa Aktif</span></p>
                <p><strong>Jurusan<span style="margin-left:55px;">:</span></strong> <span style="margin-left:5px;">S1
                        Teknik
                        Informatika</span></p>
                <p><strong>Akreditasi<span style="margin-left:37px;">:</span></strong> <span style="margin-left:5px;">Unggul
                        (040/SK/LAM-INFOKOM/Ak/S/III/2024)</span></p>
                <p><strong>Dosen Wali<span style="margin-left:29px;">:</span></strong> <span style="margin-left:5px;">Dr.
                        Zainal Abidin M.Kom</span></p>
                <p><strong>Semester<span style="margin-left:44px;">:</span></strong> <span
                        style="margin-left:5px;">(Enam)</span></p>
            </div>
        </div>

        <!-- Card Jadwal Kuliah -->
        <div class="bg-white p-4 rounded-md shadow">
            <h3 class="text-lg font-bold mb-2">Jadwal Kuliahmu Hari Ini</h3>
            <i>
                <p class="text-gray-500">Tidak Ada Jadwal Kuliah, saatnya kamu eksplorasi pengalaman baru</p>
            </i>
        </div>
    </div>

    <!-- Quotes -->
    <div class="mt-4 bg-white p-4 rounded-md shadow">
        <blockquote class="italic text-gray-600">"Lelah hadir untuk menjadi pengingat seberapa besar perjuanganmu. Kalau
            kamu lelah, rehat sejenak."</blockquote>
        <span class="text-sm text-gray-500">Positive Quotes</span>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafikIP').getContext('2d');
        const grafikIP = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2223/1 (23 sks)', '2223/2 (24 sks)', '2324/1 (22 sks)', '2324/2 (22 sks)',
                    '2425/1 (24 sks)'
                ],
                datasets: [{
                        label: 'IP Semester',
                        data: [3.7, 3.65, 3.85, 3.74, 3.94],
                        borderColor: 'rgba(0, 191, 255, 1)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        fill: false,
                        tension: 0.5
                    },
                    {
                        label: 'IP Kumulatif',
                        data: [3.7, 3.68, 3.73, 3.74, 3.78],
                        borderColor: 'rgba(17, 24, 39, 1)',
                        backgroundColor: 'rgba(17, 24, 39, 0.1)',
                        fill: false,
                        tension: 0.5
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: (context) => context.dataset.label + ": " + context.raw.toFixed(2)
                        }
                    }
                },
                scales: {
                    y: {
                        title: {
                            display: true,
                            text: 'Indeks Prestasi'
                        },
                        min: 3.0,
                        max: 4.0,
                        ticks: {
                            stepSize: 0.2
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Semester (SKS)'
                        }
                    }
                }
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
@endsection
