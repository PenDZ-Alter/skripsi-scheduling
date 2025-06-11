@extends('dashboard.admin.master')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Header + Filter Wrapper -->
        <div class="sidang-card">
            <!-- Header -->
            <div class="sidang-header">
                <h2 class="header-title">Jadwal Sidang</h2>
            </div>

            <!-- Filter Section -->
            <div class="sidang-filter">
                <div class="filter-form">
                    <div class="filter-group">
                        <label>Program Studi</label>
                        <select>
                            <option>Semua Prodi</option>
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                            <option>Manajemen</option>
                            <option>Akuntansi</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Tanggal</label>
                        <input type="date">
                    </div>
                    <button class="btn btn-filter">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <button onclick="openModalTambah()" class="btn-primary">
                        + Tambah Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Jadwal Table -->
        <div class="table-card">
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
                        @foreach ($mahasiswa as $index => $mhs)
                            @php
                                // Random dua dosen yang berbeda
                                $dosen_pengujis = $dosen->random(2);
                            @endphp
                            <tr class="hover:bg-gray-100">
                                <td class="text-center px-4 py-2 border-b">{{ $index + 1 }}</td>
                                <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $mhs->name }}</td>
                                <td class="text-center px-4 py-2 border-b">{{ $mhs->id }}</td>
                                <td class="text-left px-4 py-2 border-b whitespace-nowrap">Judul Dummy {{ $index + 1 }}
                                </td>
                                <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $dosen_pengujis[0]->name }}
                                </td>
                                <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $dosen_pengujis[1]->name }}
                                </td>
                                <td class="text-left px-4 py-2 border-b whitespace-nowrap">Hari Dummy</td>
                                <td class="text-center px-4 py-2 border-b whitespace-nowrap">Tanggal Dummy</td>
                                <td class="text-center px-4 py-2 border-b whitespace-nowrap">Waktu Dummy</td>
                                <td class="text-center px-4 py-2 border-b whitespace-nowrap">Tempat Dummy</td>
                                <td class="text-center px-4 py-2 border-b">
                                    <span
                                        class="status-label status-pending px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
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
                                    <button type="button" class="icon-button" onclick="openModalEdit()">
                                        <i class="fas fa-pencil icon-box hover:bg-gray-400"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6 hidden">
                <div class="flex-1 flex justify-between sm:hidden">
                    <a href="#"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Previous
                    </a>
                    <a href="#"
                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Next
                    </a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span
                                class="font-medium">24</span> results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <i class="bi bi-chevron-left"></i>
                            </a>
                            <a href="#" aria-current="page"
                                class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                1
                            </a>
                            <a href="#"
                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                2
                            </a>
                            <a href="#"
                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                3
                            </a>
                            <span
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                ...
                            </span>
                            <a href="#"
                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                8
                            </a>
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH DATA -->
    <div id="modalTambah" class="modal-skripsi hidden">
        <div class="modal-container">
            <div class="modal-header">
                <h2>Tambah Data Sidang</h2>
                <button onclick="closeModalTambah()" class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formTambahData" onsubmit="submitTambah(event)">
                    <div class="form-grid">
                        <input type="text" name="nama_mhs" placeholder="Nama Mahasiswa" required>
                        <input type="text" name="nim" placeholder="NIM" required>
                        <input type="text" name="judul" placeholder="Judul" required>
                        <input type="text" name="penguji1" placeholder="Anggota Penguji I" required>
                        <input type="text" name="penguji2" placeholder="Anggota Penguji II" required>
                        <input type="text" name="hari" placeholder="Hari" required>
                        <input type="date" name="tanggal" required>
                        <input type="text" name="waktu" placeholder="Waktu (Contoh: 09:00 - 11:00 WIB)" required>
                        <input type="text" name="tempat" placeholder="Tempat" required>
                        <select name="status" required>
                            <option value="pending">Pending</option>
                            <option value="terjadwal">Terjadwal</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="closeModalTambah()" class="btn-secondary">Batal</button>
                        <button type="submit" class="btn-save">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 10rem;">
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

    <script>
        function openModalTambah() {
            document.getElementById('modalTambah').classList.remove('hidden');
        }

        function closeModalTambah() {
            document.getElementById('modalTambah').classList.add('hidden');
        }

        function submitTambah(e) {
            e.preventDefault();

            const form = document.getElementById('formTambahData');
            const data = Object.fromEntries(new FormData(form).entries());

            console.log("Data yang dikirim:", data);

            // TODO: Tambahkan kode untuk menyimpan data ke server, atau tambahkan langsung ke tabel jika client-side only

            closeModalTambah();
            form.reset();
            alert("Data berhasil ditambahkan (simulasi)");
        }
    </script>
@endsection
