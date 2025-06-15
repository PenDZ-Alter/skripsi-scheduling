@extends('dashboard.admin.master')

@section('content')
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
                    <div class="demo-container">
                        <button class="btn-add" onclick="openModal()">
                            <span>📅</span>
                            Tambah Jadwal Sidang
                        </button>
                    </div>
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
                            <th class="text-center px-4 py-2">Jadwal Mulai</th>
                            <th class="text-center px-4 py-2">Jadwal Selesai</th>
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
                                <td class="text-left px-4 py-2 border-b whitespace-nowrap">Jadwal Mulai Dummy</td>
                                <td class="text-center px-4 py-2 border-b whitespace-nowrap">Jadwal Selesai Dummy</td>
                                <td class="text-center px-4 py-2 border-b whitespace-nowrap">Tempat Dummy</td>
                                <td class="text-center px-4 py-2 border-b">
                                    <span
                                        class="status-label status-pending px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                </td>
                                <td class="text-left px-4 py-2 border-b whitespace-nowrap">

                                    <button type="button" class="icon-button" onclick="populateAndOpenEditModal(this)"
                                        data-nama="{{ $mhs->name }}" data-nim="{{ $mhs->id }}"
                                        data-judul="Judul Dummy {{ $index + 1 }}"
                                        data-penguji1="{{ $dosen_pengujis[0]->name }}"
                                        data-penguji2="{{ $dosen_pengujis[1]->name }}" data-tanggal="2025-01-01"
                                        {{-- Ganti dengan data asli kalau udah --}} data-waktu="09:00 - 11:00 WIB" data-tempat="Ruang Dummy"
                                        data-status="pending">
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

    <!-- Modal Tambah -->
    <div class="modal-overlay-skripsi" id="modalOverlay-skripsi">
        <div class="modal-container">
            <div class="modal-header-skripsi">
                <h2 class="modal-title-skripsi">
                    <span>📝</span>
                    Tambah Jadwal Sidang
                </h2>
                <button class="close-btn" onclick="closeModal()">×</button>
            </div>

            <div class="modal-body-skripsi">
                <form id="scheduleForm" onsubmit="handleSubmit(event)">
                    <!-- Student Information Section -->
                    <div class="form-section">
                        <div class="section-card">
                            <h3 class="section-title">
                                <span>👤</span>
                                Informasi Mahasiswa
                            </h3>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-input" name="nama_mhsTambah"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>
                                <div class="form-field">
                                    <label class="form-label">NIM</label>
                                    <input type="text" class="form-input" name="nimTambah"
                                        placeholder="Nomor Induk Mahasiswa" required>
                                </div>
                                <div class="form-field full-width">
                                    <label class="form-label">Judul Skripsi</label>
                                    <input type="text" class="form-input" name="judulTambah"
                                        placeholder="Judul lengkap skripsi" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Supervisor Information Section -->
                    <div class="form-section">
                        <div class="section-card">
                            <h3 class="section-title">
                                <span>👨‍🏫</span>
                                Dosen Pembimbing
                            </h3>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label class="form-label">Pembimbing 1</label>
                                    <input type="text" class="form-input" name="pembimbingTambah"
                                        placeholder="Nama dosen pembimbing 1" required>
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Pembimbing 2</label>
                                    <input type="text" class="form-input" name="pembimbingTambah"
                                        placeholder="Nama dosen pembimbing 2" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Information Section -->
                    <div class="form-section">
                        <div class="section-card">
                            <h3 class="section-title">
                                <span>📅</span>
                                Jadwal Sidang
                            </h3>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-input" name="tanggalTambah" required>
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Waktu</label>
                                    <input type="text" class="form-input" name="waktuTambah"
                                        placeholder="09:00 - 11:00 WIB" required>
                                </div>
                                <div class="form-field full-width">
                                    <label class="form-label">Tempat</label>
                                    <input type="text" class="form-input" name="tempatTambah"
                                        placeholder="Ruang sidang / lokasi" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="form-section">
                        <div class="section-card">
                            <h3 class="section-title">
                                <span>📊</span>
                                Status Sidang
                            </h3>
                            <div class="status-options" id="status-options-1">
                                <div class="status-option">
                                    <input type="radio" id="pending-1" name="status-1" value="pending" onclick="syncStatus('pending')">
                                    <label for="pending-1" class="status-label">⏳ Pending</label>
                                </div>
                                <div class="status-option">
                                    <input type="radio" id="scheduled-1" name="status-1" value="terjadwal" onclick="syncStatus('terjadwal')">
                                    <label for="scheduled-1" class="status-label">📋 Terjadwal</label>
                                </div>
                                <div class="status-option">
                                    <input type="radio" id="completed-1" name="status-1" value="selesai" onclick="syncStatus('selesai')">
                                    <label for="completed-1" class="status-label">✅ Selesai</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer-skripsi">
                <button type="button" class="btn-cancel-skripsi" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-save-skripsi" form="scheduleForm">Simpan Jadwal</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal-overlay-skripsi" id="modalOverlayEdit">
        <div class="modal-container">
            <div class="modal-header-skripsi">
                <h2 class="modal-title-skripsi">
                    <span>📝</span>
                    Edit Jadwal Sidang
                </h2>
                <button class="close-btn" onclick="closeModalEdit()">×</button>
            </div>

            <div class="modal-body-skripsi">
                <form id="scheduleForm" onsubmit="handleSubmitEdit(event)">
                    <!-- Student Information Section -->
                    <div class="form-section">
                        <div class="section-card">
                            <h3 class="section-title">
                                <span>👤</span>
                                Informasi Mahasiswa
                            </h3>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-input" name="nama_mhs" id="nama_mhs" required>
                                </div>
                                <div class="form-field">
                                    <label class="form-label">NIM</label>
                                    <input type="text" class="form-input" name="nim" id="nim" required>
                                </div>
                                <div class="form-field full-width">
                                    <label class="form-label">Judul Skripsi</label>
                                    <input type="text" class="form-input" name="judul" id="judul" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Supervisor Information Section -->
                    <div class="form-section">
                        <div class="section-card">
                            <h3 class="section-title">
                                <span>👨‍🏫</span>
                                Dosen Pembimbing
                            </h3>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label class="form-label">Pembimbing 1</label>
                                    <input type="text" class="form-input" name="pembimbing1" id="pembimbing1"
                                        required>
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Pembimbing 2</label>
                                    <input type="text" class="form-input" name="pembimbing2" id="pembimbing2"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Information Section -->
                    <div class="form-section">
                        <div class="section-card">
                            <h3 class="section-title">
                                <span>📅</span>
                                Jadwal Sidang
                            </h3>
                            <div class="form-grid">
                                <div class="form-field">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-input" name="tanggal" id="tanggal" required>
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Waktu</label>
                                    <input type="text" class="form-input" name="waktu" id="waktu" required>
                                </div>
                                <div class="form-field full-width">
                                    <label class="form-label">Tempat</label>
                                    <input type="text" class="form-input" name="tempat" id="tempat" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="status-options" id="status-options-1">
                        <div class="status-option">
                            <input type="radio" id="pending-1" name="status-1" value="pending" onclick="syncStatus('pending')">
                            <label for="pending-1" class="status-label">⏳ Pending</label>
                        </div>
                        <div class="status-option">
                            <input type="radio" id="scheduled-1" name="status-1" value="terjadwal" onclick="syncStatus('terjadwal')">
                            <label for="scheduled-1" class="status-label">📋 Terjadwal</label>
                        </div>
                        <div class="status-option">
                            <input type="radio" id="completed-1" name="status-1" value="selesai" onclick="syncStatus('selesai')">
                            <label for="completed-1" class="status-label">✅ Selesai</label>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer-skripsi">
                <button type="button" class="btn-cancel-skripsi" onclick="closeModalEdit()">Batal</button>
                <button type="submit" class="btn-save-skripsi" form="scheduleForm">Simpan Jadwal</button>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 10rem;">
    </div>
    <script>
        function syncStatus(status) {
    // Mapping status ke id radio group kedua
    const map = {
        'pending': 'pending-2',
        'terjadwal': 'scheduled-2',
        'selesai': 'completed-2'
    };

    // Cek dan set radio kedua
    const radio2 = document.getElementById(map[status]);
    if (radio2) radio2.checked = true;

    // Ubah warna label aktif (untuk kedua grup)
    updateLabelHighlight('status-options-1', status);
    updateLabelHighlight('status-options-2', status);
}

function updateLabelHighlight(containerId, status) {
    const container = document.getElementById(containerId);
    const labels = container.querySelectorAll('.status-label');

    // Reset semua label
    labels.forEach(label => {
        label.style.backgroundColor = '';
        label.style.color = '';
        label.style.fontWeight = '';
        label.style.padding = '';
        label.style.borderRadius = '';
    });

    // Tambah style ke label yang cocok
    const targetLabel = container.querySelector(`input[value="${status}"], input[value="${status}Tambah"]`);
    if (targetLabel) {
        const label = container.querySelector(`label[for="${targetLabel.id}"]`);
        if (label) {
            label.style.backgroundColor = '#4CAF50';
            label.style.color = 'white';
            label.style.fontWeight = 'bold';''
        }
    }
}
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

        document.addEventListener("DOMContentLoaded", function() {
            const radios = document.querySelectorAll('input[name="status"]');

            function activateLabel(radio) {
                document.querySelectorAll(".status-label").forEach(label => {
                    label.classList.remove("active-status");
                });

                const label = document.querySelector(`label[for="${radio.id}"]`);
                if (label) {
                    label.classList.add("active-status");
                }
            }

            radios.forEach(radio => {
                radio.addEventListener("change", function() {
                    activateLabel(this);
                });
            });

            // Jalankan sekali saat load halaman (kalau ada yang udah checked)
            const checked = document.querySelector('input[name="status"]:checked');
            if (checked) {
                activateLabel(checked);
            }
        });
    </script>

    <script>
        function openModal() {
            const modal = document.getElementById('modalOverlay-skripsi');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('modalOverlay-skripsi');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';

            // Reset form
            document.getElementById('scheduleForm').reset();
            document.getElementById('pending').checked = true;
        }

        function handleSubmit(event) {
            event.preventDefault();

            // Get form data
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData.entries());

            // Simple validation feedback
            const saveBtn = document.querySelector('.btn-save');
            const originalText = saveBtn.textContent;

            saveBtn.textContent = 'Menyimpan...';
            saveBtn.disabled = true;

            // Simulate save process
            setTimeout(() => {
                saveBtn.textContent = '✓ Tersimpan!';
                saveBtn.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';

                setTimeout(() => {
                    console.log('Data saved:', data);
                    alert('Jadwal sidang berhasil disimpan!');
                    closeModal();

                    // Reset button
                    saveBtn.textContent = originalText;
                    saveBtn.disabled = false;
                    saveBtn.style.background = '';
                }, 1000);
            }, 800);
        }

        // Close modal when clicking outside
        document.getElementById('modalOverlay-skripsi').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>

    <script>
        function populateAndOpenEditModal(button) {
            // Ambil semua data dari atribut tombol
            const nama = button.getAttribute('data-nama');
            const nim = button.getAttribute('data-nim');
            const judul = button.getAttribute('data-judul');
            const penguji1 = button.getAttribute('data-penguji1');
            const penguji2 = button.getAttribute('data-penguji2');
            const tanggal = button.getAttribute('data-tanggal');
            const waktu = button.getAttribute('data-waktu');
            const tempat = button.getAttribute('data-tempat');
            const status = button.getAttribute('data-status');

            // Isi form input di modal
            document.querySelector('[name="nama_mhs"]').value = nama;
            document.querySelector('[name="nim"]').value = nim;
            document.querySelector('[name="judul"]').value = judul;
            document.querySelector('[name="pembimbing1"]').value = penguji1;
            document.querySelector('[name="pembimbing2"]').value = penguji2;
            document.querySelector('[name="tanggal"]').value = tanggal;
            document.querySelector('[name="waktu"]').value = waktu;
            document.querySelector('[name="tempat"]').value = tempat;

            console.log(document.querySelector('[name="nama_mhs"]'))
            // Atur radio button status
            document.querySelectorAll('input[name="status"]').forEach(radio => {
                radio.checked = (radio.value === status);
            });

            // Terakhir: Tampilkan modal
            openModalEdit();
        }

        function openModalEdit() {
            const modal = document.getElementById('modalOverlayEdit');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModalEdit() {
            const modal = document.getElementById('modalOverlayEdit');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';

            // Reset form
            document.getElementById('scheduleForm').reset();
            document.getElementById('pending').checked = true;
        }

        function handleSubmitEdit(event) {
            event.preventDefault();

            // Get form data
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData.entries());

            // Simple validation feedback
            const saveBtn = document.querySelector('.btn-save');
            const originalText = saveBtn.textContent;

            saveBtn.textContent = 'Menyimpan...';
            saveBtn.disabled = true;

            // Simulate save process
            setTimeout(() => {
                saveBtn.textContent = '✓ Tersimpan!';
                saveBtn.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';

                setTimeout(() => {
                    console.log('Data saved:', data);
                    alert('Jadwal sidang berhasil disimpan!');
                    closeModal();

                    // Reset button
                    saveBtn.textContent = originalText;
                    saveBtn.disabled = false;
                    saveBtn.style.background = '';
                }, 1000);
            }, 800);
        }

        // Close modal when clicking outside
        document.getElementById('modalOverlayEdit').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModalEdit();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModalEdit();
            }
        });
    </script>
@endsection
