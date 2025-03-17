@extends('dashboard.master')

@section('content')
  <!-- Bagian Salam -->
  <div class="bg-gray-50 p-4 rounded-md mb-4">
    <h2 class="text-xl font-bold">Salam, Alfariz Muhan Mandega</h2>
    <p class="text-sm text-gray-600">Info Profil & Email UIN, Klik <a href="#" class="text-blue-600">Di Sini</a></p>
  </div>

  <!-- Grid 2 Kolom -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Card Profil -->
    <div class="bg-white p-4 rounded-md shadow">
      <div class="flex items-center space-x-4">
        <img src="{{ asset('storage/img/Alfariz.png') }}" alt="Foto Profil" class="w-20 h-20 rounded-md">
        <div>
          <h3 class="text-lg font-bold">Alfariz Muhan Mandega</h3>
          <p class="text-sm">Mahasiswa Aktif</p>
        </div>
      </div>
    </div>

    <!-- Card Free Access Journal -->
    <div class="bg-white p-4 rounded-md shadow">
      <h3 class="text-lg font-bold mb-2">Free Access Journal</h3>
      <ul class="space-y-2">
        <li><a href="#" class="text-blue-600 hover:underline">Link Springer</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Emerald Insight</a></li>
        <li><a href="#" class="text-blue-600 hover:underline">Cambridge Core</a></li>
      </ul>
    </div>
  </div>

  <!-- 📊 Grafik IP & IPK Mahasiswa -->
  <div class="bg-white p-4 mt-6 rounded-md shadow text-center">
    <h3 class="text-lg font-bold mb-2">Grafik Indeks Prestasi</h3>
    <p class="text-sm text-gray-600 mb-4">[220605110025 - Alfariz Muhan Mandega]</p>
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
    <blockquote class="italic text-gray-600">"Lelah hadir untuk menjadi pengingat seberapa besar perjuanganmu. Kalau kamu lelah, rehat sejenak."</blockquote>
    <span class="text-sm text-gray-500">Positive Quotes</span>
  </div>

  <!-- Script Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('grafikIP').getContext('2d');
    const grafikIP = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2223/1 (23 sks)', '2223/2 (24 sks)', '2324/1 (22 sks)', '2324/2 (22 sks)', '2425/1 (24 sks)'],
            datasets: [
                {
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
                legend: { position: 'bottom' },
                tooltip: {
                    callbacks: {
                        label: (context) => context.dataset.label + ": " + context.raw.toFixed(2)
                    }
                }
            },
            scales: {
                y: {
                    title: { display: true, text: 'Indeks Prestasi' },
                    min: 3.0,
                    max: 4.0,
                    ticks: {
                        stepSize: 0.2
                    }
                },
                x: {
                    title: { display: true, text: 'Semester (SKS)' }
                }
            }
        }
    });
  </script>
@endsection
