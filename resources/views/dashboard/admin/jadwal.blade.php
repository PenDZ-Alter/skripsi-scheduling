@extends('dashboard.admin.master')

@section('content')
<!-- Main Content -->
<div class="flex-1 overflow-auto">

    <!-- Content -->
    <main class="p-1">
        <!-- Header -->
    <div class="bg-white p-4 flex justify-between items-center">
        <h2 class="text-xl font-semibold">Jadwal Sidang</h2>
        <div class="flex items-center space-x-4">
            <button class="p-2 rounded-full hover:bg-gray-100">
                <i class="bi bi-bell"></i>
            </button>
        </div>
    </div>
        <!-- Filter Section -->
        <div class="bg-white rounded-lg p-4 mb-6">
            <div class="flex flex-wrap gap-4 items-center">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                    <select class="w-full p-2 border border-gray-300 rounded">
                        <option>Semua Prodi</option>
                        <option>Teknik Informatika</option>
                        <option>Sistem Informasi</option>
                        <option>Manajemen</option>
                        <option>Akuntansi</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    <i class="bi bi-funnel"></i> Filter
                </button>
                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    <i class="bi bi-plus-lg"></i> Tambah Jadwal
                </button>
            </div>
        </div>

        <!-- Jadwal Table -->
        <div class="bg-white rounded-lg shadow mt-3">
            <div class="max-h-[700px] overflow-y-auto">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-50 border-t border-b border-gray-300 h-10 sticky top-0 z-10">
                        <tr class="bg-gray-50 border-t border-b border-gray-300 h-10">
                            <th class="text-center px-4 py-2">No</th>
                            <th class="text-center px-4 py-2">Nama Mhs</th>
                            <th class="text-center px-4 py-0.5">NIM</th>
                            <th class="text-center px-4 py-2">Judul</th>
                            <th class="text-center px-4 py-2">Anggota Penguji I</th>
                            <th class="text-center px-4 py-2">Anggota Penguji II</th>
                            <th class="text-center px-4 py-2">Hari</th>
                            <th class="text-center px-4 py-2">Tanggal</th>
                            <th class="text-center px-4 py-2">Waktu</th>
                            <th class="text-center px-4 py-2">Tempat</th>
                            <th class="text-center px-4 py-2">Status</th>
                            <th class="text-center px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr class="hover:bg-gray-100">
                            <td class="text-center px-4 py-2 border-b">1</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Andi Wijaya</td>
                            <td class="text-center px-4 py-2 border-b">18081010001</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Sistem Rekomendasi Pemilihan Jurusan</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Dr. Siti Rahayu, M.Kom.</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Dr. Rina Dewi, M.Kom.</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Rabu</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">15 Jun 2023</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">09:00 - 11:00 WIB</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">R. Sidang 1</td>
                            <td class="text-center px-4 py-2 border-b">
                                <span class="status-label status-terjadwal px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 hidden">
                                    Terjadwal
                                </span>
                                <span class="status-label status-pending px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                                <span class="status-label status-selesai px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 hidden">
                                    Selesai
                                </span>
                            </td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">
                                <a href="#" onclick="showStatus(this, 'pending')">
                                    <i class="fas fa-clock icon-box hover:bg-orange-300"></i>
                                </a>
                                <a href="#" onclick="showStatus(this, 'terjadwal')">
                                    <i class="fas fa-check-circle icon-box hover:bg-green-300"></i>
                                </a>
                                <a href="#" onclick="showStatus(this, 'selesai')">
                                    <i class="fas fa-check icon-box hover:bg-blue-400"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-pencil icon-box hover:bg-gray-400"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-gray-100">
                            <td class="text-center px-4 py-2 border-b">2</td>
                            <td class="text-left px-4 py-0.5 border-b whitespace-nowrap">Budi Santoso</td>
                            <td class="text-center px-4 py-0.5 border-b">18081010002</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Analisis Sentimen Media Sosial</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Dr. Joko Prasetyo, M.Kom.</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Prof. Dr. Bambang Sutrisno</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Jum'at</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">16 Jun 2023</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">13:00 - 15:00 WIB</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">R. Sidang 2</td>
                            <td class="text-center px-4 py-2 border-b">
                                <span class="status-label status-terjadwal px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 hidden">
                                    Terjadwal
                                </span>
                                <span class="status-label status-pending px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                                <span class="status-label status-selesai px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 hidden">
                                    Selesai
                                </span>
                            </td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">
                                <a href="#" onclick="showStatus(this, 'pending')">
                                    <i class="fas fa-clock icon-box hover:bg-orange-300"></i>
                                </a>
                                <a href="#" onclick="showStatus(this, 'terjadwal')">
                                    <i class="fas fa-check-circle icon-box hover:bg-green-300"></i>
                                </a>
                                <a href="#" onclick="showStatus(this, 'selesai')">
                                    <i class="fas fa-check icon-box hover:bg-blue-400"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-pencil icon-box hover:bg-gray-400"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-100">
                            <td class="text-center px-4 py-2 border-b">3</td>
                            <td class="text-left px-4 py-0.5 border-b whitespace-nowrap">Citra Dewi</td>
                            <td class="text-center px-4 py-0.5 border-b">19082010001</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Optimasi Algoritma dengan ML</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Dr. Ani Wijaya, M.Kom.</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Dr. Ahmad Fauzi, M.Kom.</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">Kamis</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">17 Jun 2023</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">10:00 - 12:00 WIB</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">R. Sidang 3</td>
                            <td class="text-center px-4 py-2 border-b">
                                <span class="status-label status-terjadwal px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 hidden">
                                    Terjadwal
                                </span>
                                <span class="status-label status-pending px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                                <span class="status-label status-selesai px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 hidden">
                                    Selesai
                                </span>
                            </td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">
                                <a href="#" onclick="showStatus(this, 'pending')">
                                    <i class="fas fa-clock icon-box hover:bg-orange-300"></i>
                                </a>
                                <a href="#" onclick="showStatus(this, 'terjadwal')">
                                    <i class="fas fa-check-circle icon-box hover:bg-green-300"></i>
                                </a>
                                <a href="#" onclick="showStatus(this, 'selesai')">
                                    <i class="fas fa-check icon-box hover:bg-blue-400"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-pencil icon-box hover:bg-gray-400"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Previous
                    </a>
                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Next
                    </a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">24</span> results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <i class="bi bi-chevron-left"></i>
                            </a>
                            <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                1
                            </a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                2
                            </a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                3
                            </a>
                            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                ...
                            </span>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                8
                            </a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
function showStatus(button, statusToShow) {
    const td = button.closest('td').previousElementSibling;
    const allStatus = td.querySelectorAll('.status-label');

    allStatus.forEach(span => {
        span.classList.add('hidden'); // sembunyikan semua
    });

    const target = td.querySelector(`.status-${statusToShow}`);
    if (target) {
        target.classList.remove('hidden'); // tampilkan yang sesuai
    }
}
</script>

@endsection
