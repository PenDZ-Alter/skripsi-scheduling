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
                    <div style="height: 150px; width:150px; margin-top:20px; margin-left-10px;">
                        <img class="min-w-0.5 min-h-0.5" id="profileImage" src="{{ asset('storage/img/Alfariz.png') }}"
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
                <div style="margin-top: 15px; margin-left: 40px">
                    <h3 class="text-xs font-bold">Info Profil & Email UIN, Klik
                        <a href="#" style="font-size:0.90rem;" class="text-blue-600"><u>Di SINI</u></a>
                    </h3>
                    <p style="margin-top:5px" class="text-sm font-semibold"> - Default password email sesuai siakad</p>
                    <p style="margin-top:5px" class="text-sm font-semibold"> - Ubah password email, klik
                        <a href="#" class="text-blue-600">Di SINI</a>
                    </p>
                    <p style="margin-top:5px" class="text-sm font-semibold"> - Buka email UIN, klik
                        <a href="#" class="text-blue-600">gmail.com</a>
                    </p>
                    <p style="margin-left: 10px" class="text-sm font-semibold"> Add account:
                        <i style="margin-right:-1px;">NIM</i>@student.uin-malang.ac.id
                    </p>
                    <p style="margin-top:5px" class="text-sm font-semibold"> - Untuk aktivasi email UIN, klik
                        <a href="#" class="text-blue-600">Di SINI</a>
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Free Access Journal -->
            <div>
                <h3 style="text-align: right; font-size: 1.50rem; font-weight: 300;" class="text-right mb-4">Free Access
                    Journal</h3>
                <div class="space-y-2">
                    <a href="https://link.springer.com/"
                        style="display: block; background: linear-gradient(to right, rgba(254, 215, 170, 0.2), #fed7aa); text-align: right; font-size: 0.80rem;"
                        class="px-4 py-4 font-semibold text-gray-700 rounded">
                        Free Access Link Springer <span style="font-size: 1.2rem; font-weight: 700;">&laquo;</span>
                    </a>
                    <a href="https://www.emerald.com/insight/"
                        style="display: block; background: linear-gradient(to right, rgba(190, 242, 100, 0.2), #bef264)
                  ; text-align: right; font-size: 0.80rem;"
                        class="px-4 py-4 font-semibold text-gray-700 rounded">
                        Free Access Emerald Insight <span style="font-size: 1.2rem; font-weight: 700;">&laquo;</span>
                    </a>
                    <a href="https://www.cambridge.org/core/"
                        style="display: block; background: linear-gradient(to right, rgba(254, 240, 138, 0.2), #fef08a); text-align: right; font-size: 0.80rem;"
                        class="px-4 py-4 font-semibold text-gray-700 rounded">
                        Free Access Cambridge Core <span style="font-size: 1.2rem; font-weight: 700;">&laquo;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- 📊 Grafik IP & IPK Mahasiswa -->
    <div class="bg-white p-4 mt-6 rounded-md shadow text-center">
        <h3 class="text-lg font-bold mb-2">Grafik Indeks Prestasi</h3>
        <p style="letter-spacing:1px; font-weight:500;" class="text-sm text-gray-600 mb-4">220605110025 - <span
                style="letter-spacing:-1px;">ALFARIZ MUHAN MANDEGA</span></p>
        <canvas id="grafikIP" height="120"></canvas>
    </div>


    <!-- Grid 2 Kolom untuk Data Akademik & Jadwal Kuliah -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <!-- Card Data Akademik -->
        <div class="bg-white p-4 rounded-md shadow">
            <h3 class="text-lg font-bold mb-2">Data Akademik</h3>
            <div class="space-y-2">
                <p><strong>NIM:</strong> 220605110025</p>
                <p><strong>Status Studi:</strong> Mahasiswa Aktif</p>
                <p><strong>Jurusan:</strong> S1 Teknik Informatika</p>
                <p><strong>Akreditasi:</strong> Unggul (040/SK/LAM-INFOKOM/Ak/S/III/2024)</p>
                <p><strong>Dosen Wali:</strong> Dr. Zainal Abidin M.Kom</p>
                <p><strong>Semester:</strong> VI (Enam)</p>
            </div>
        </div>

        <!-- Card Jadwal Kuliah -->
        <div class="bg-white p-4 rounded-md shadow">
            <h3 class="text-lg font-bold mb-2">Jadwal Kuliahmu Hari Ini</h3>
            <p class="text-gray-500">Tidak Ada Jadwal Kuliah, saatnya kamu eksplorasi pengalaman baru</p>
        </div>
    </div>

    <!-- Quotes -->
    <div class="mt-4 bg-white p-4 rounded-md shadow">
        <blockquote class="italic text-gray-600">"Lelah hadir untuk menjadi pengingat seberapa besar perjuanganmu. Kalau
            kamu lelah, rehat sejenak."</blockquote>
        <span class="text-sm text-gray-500">Positive Quotes</span>
    </div>

    <!-- Script Chart.js -->
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
                        borderColor: 'rgba(59, 130, 246, 1)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'IP Kumulatif',
                        data: [3.7, 3.68, 3.73, 3.74, 3.78],
                        borderColor: 'rgba(17, 24, 39, 1)',
                        backgroundColor: 'rgba(17, 24, 39, 0.1)',
                        fill: false,
                        tension: 0.3
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
@endsection
