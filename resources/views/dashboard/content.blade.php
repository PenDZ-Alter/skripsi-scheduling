@extends("dashboard.master")

@section("content")
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-blue-900 text-white p-5 space-y-4">
        <h2 class="text-lg font-bold">Siakad Universitas</h2>
        <nav>
            <ul class="space-y-2">
                <li><a href="#" class="block p-2 hover:bg-blue-700 rounded">Home</a></li>
                <li><a href="#" class="block p-2 hover:bg-blue-700 rounded">Profil Mahasiswa</a></li>
                <li><a href="#" class="block p-2 hover:bg-blue-700 rounded">Rekap Pembayaran</a></li>
                <li><a href="#" class="block p-2 hover:bg-blue-700 rounded">Jadwal Perkuliahan</a></li>
                <li><a href="#" class="block p-2 hover:bg-blue-700 rounded">Skripsi & Tesis</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold">Dashboard Akademik</h1>
            <span class="bg-green-500 text-white py-1 px-3 rounded">Mahasiswa Aktif</span>
        </header>
        
        <!-- Profil Mahasiswa -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-5 shadow rounded">
                <h2 class="text-lg font-semibold mb-3">Info Profil</h2>
                <p><strong>NIM:</strong> 12345678</p>
                <p><strong>Status Studi:</strong> Mahasiswa Aktif</p>
                <p><strong>Jurusan:</strong> Teknik Informatika</p>
                <p><strong>Dosen Wali:</strong> Dr. Irwan Budi Santoso</p>
                <p><strong>Semester:</strong> VI (Enam)</p>
            </div>
            
            <div class="bg-white p-5 shadow rounded">
                <h2 class="text-lg font-semibold mb-3">Jadwal Kuliah Hari Ini</h2>
                <p class="text-gray-500">Tidak Ada Jadwal Kuliah</p>
            </div>
        </div>
        
        <!-- Quote Section -->
        <div class="mt-6 bg-gray-200 p-4 rounded text-center italic">
            "Lelah hadir untuk menjadi pengingat seberapa besar perjuanganmu. Kalau kamu lelah, rehat sejenak."
        </div>
    </div>
</div>
@endsection
