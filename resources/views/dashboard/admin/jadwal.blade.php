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
                    @foreach ($skripsis as $index => $mhs)
                        <tr class="hover:bg-gray-100">
                            <td class="text-center px-4 py-2 border-b">{{ $index + 1 }}</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $mhs->mahasiswa->name }}</td>
                            <td class="text-center px-4 py-2 border-b">{{ $mhs->mahasiswa->id }}</td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $mhs->judul }}
                            </td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $mhs->pembimbing1->name }}
                            </td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $mhs->pembimbing2->name }}
                            </td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">{{ $mhs->jadwal_mulai }}</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">{{ $mhs->jadwal_selesai }}</td>
                            <td class="text-center px-4 py-2 border-b whitespace-nowrap">{{ $mhs->ruang->nama_ruang }}</td>
                            <td class="text-center px-4 py-2 border-b">
                                <span
                                    class="status-label status-pending px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $mhs->status}}</span>
                            </td>
                            <td class="text-left px-4 py-2 border-b whitespace-nowrap">

                                <button type="button" class="icon-button" onclick="populateAndOpenEditModal(this)"
                                    data-id="{{ $mhs->id }}"
                                    data-nama="{{ $mhs->mahasiswa->name }}" data-nim="{{ $mhs->mahasiswa->id }}"
                                    data-judul="{{ $mhs->judul }}" data-penguji1="{{ $mhs->pembimbing1->name }}" data-penguji1-id="{{ $mhs->pembimbing1->id }}"
                                    data-penguji2="{{ $mhs->pembimbing2->name }}" data-penguji2-id="{{ $mhs->pembimbing2->id }}" data-jadwal-mulai="{{ $mhs->jadwal_mulai }}" {{-- Ganti
                                    dengan data asli kalau udah --}} data-jadwal-selesai="{{ $mhs->jadwal_selesai }}"
                                    data-tempat="{{ $mhs->ruang->nama_ruang }}" data-tempat-id="{{ $mhs->ruang->id }}" data-status="{{ $mhs->status }}">
                                    <i class="fas fa-pencil icon-box hover:bg-gray-400"></i>
                                </button>
                                <!-- Modal Edit -->
                                <div class="modal-overlay-skripsi" id="modalOverlayEdit{{ $mhs->id }}">
                                    <div class="modal-container">
                                        <div class="modal-header-skripsi">
                                            <h2 class="modal-title-skripsi">
                                                <span>📝</span>
                                                Edit Jadwal Sidang
                                            </h2>
                                            <button class="close-btn" onclick="closeModalEdit({{ $mhs->id }})">×</button>
                                        </div>

                                        <div class="modal-body-skripsi">
                                            <form id="scheduleForm{{ $mhs->id }}" method="POST"
                                                action="{{ route('skripsi.update', $mhs->id) }}">
                                                @csrf

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
                                                                <input type="text" class="form-input" name="nama_mhs"
                                                                    id="nama_mhs" readonly disabled>
                                                            </div>
                                                            <div class="form-field">
                                                                <label class="form-label">NIM</label>
                                                                <input type="text" class="form-input" name="nim" id="nim"
                                                                    readonly disabled>
                                                            </div>
                                                            <div class="form-field full-width">
                                                                <label class="form-label">Judul Skripsi</label>
                                                                <input type="text" class="form-input" name="judul"
                                                                    id="judul" required>
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
                                                                {{-- <input type="text" class="form-input" name="pembimbing1"
                                                                    id="pembimbing1" required> --}}
                                                                <select class="form-input" name="pembimbing1">
                                                                    <option id="def_p1">{{ $mhs->pembimbing1->name }}</option>
                                                                    @foreach ($dosen as $dosen1)
                                                                        <option value="{{ $dosen1->id }}">{{ $dosen1->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-field">
                                                                <label class="form-label">Pembimbing 2</label>
                                                                {{-- <input type="text" class="form-input" name="pembimbing2"
                                                                    id="pembimbing2" required> --}}
                                                                <select class="form-input" name="pembimbing2">
                                                                    <option id="def_p2">{{ $mhs->pembimbing2->name }}</option>
                                                                    @foreach ($dosen as $dosen2)
                                                                        <option value="{{ $dosen2->id }}">{{ $dosen2->name }}</option>
                                                                    @endforeach
                                                                </select>
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
                                                                <label class="form-label">Jadwal Mulai</label>
                                                                <input type="datetime-local" class="form-input" name="jadwal_mulai"
                                                                    id="tanggal" required>
                                                            </div>
                                                            <div class="form-field">
                                                                <label class="form-label">Jadwal Selesai</label>
                                                                <input type="datetime-local" class="form-input" name="jadwal_selesai"
                                                                    id="waktu" required>
                                                            </div>
                                                            <div class="form-field full-width">
                                                                <label class="form-label">Tempat</label>
                                                                {{-- <input type="text" class="form-input" name="ruang_sidang"
                                                                    id="tempat" required> --}}
                                                                <select class="form-input" name="ruang_sidang">
                                                                    <option id="def_tempat">{{ $mhs->ruang->nama_ruang }}</option>
                                                                @foreach ($ruangSidangList as $ruang)
                                                                    <option value="{{ $ruang->id }}">{{ $ruang->nama_ruang }}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Status Section -->
                                                <div class="status-options" id="status-options-{{ $mhs->id }}">
                                                    <div class="status-option">
                                                        <input type="radio" id="pending-{{ $mhs->id }}" name="status" value="pending"
                                                            onclick="syncStatus('{{ $mhs->id }}', 'pending')">
                                                        <label for="pending-{{ $mhs->id }}" class="status-label">⏳ Pending</label>
                                                    </div>
                                                    <div class="status-option">
                                                        <input type="radio" id="scheduled-{{ $mhs->id }}" name="status"
                                                            value="terjadwal" onclick="syncStatus('{{ $mhs->id }}','terjadwal')">
                                                        <label for="scheduled-{{ $mhs->id }}" class="status-label">📋 Terjadwal</label>
                                                    </div>
                                                    <div class="status-option">
                                                        <input type="radio" id="completed-{{ $mhs->id }}" name="status" value="selesai"
                                                            onclick="syncStatus('{{ $mhs->id }}', 'selesai')">
                                                        <label for="completed-{{ $mhs->id }}" class="status-label">✅ Selesai</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer-skripsi">
                                            <button type="button" class="btn-cancel-skripsi"
                                                onclick="closeModalEdit($mhs->id)">Batal</button>
                                            <button type="submit" class="btn-save-skripsi" form="scheduleForm{{ $mhs->id }}">Simpan
                                                Jadwal</button>
                                        </div>
                                    </div>
                                </div>
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
            <form id="scheduleForm{{ $mhs->id }}" method="POST" action="{{ route('adm.jadwal') }}">
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
                                <select name="user_id" id="user_id" class="form-control" required
                                    onchange="tampilkanID()">
                                    <option value="" disabled selected>Pilih Mahasiswa</option>
                                    @foreach($mahasiswa as $mhs)
                                        <option value="{{ $mhs->id }}">{{ $mhs->name }} ({{ $mhs->nim }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-field">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-input" name="nimTambah" id="nimTambah"
                                    placeholder="Nomor Induk Mahasiswa" required readonly>
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
                                <input type="text" class="form-input" name="waktuTambah" placeholder="09:00 - 11:00 WIB"
                                    required>
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
                        <div class="status-options" id="status-options-def">
                            <div class="status-option">
                                <input type="radio" id="pending-def" name="status-def" value="pending"
                                    onclick="syncStatus('def', 'pending')">
                                <label for="pending-def" class="status-label">⏳ Pending</label>
                            </div>
                            <div class="status-option">
                                <input type="radio" id="scheduled-def" name="status-def" value="terjadwal"
                                    onclick="syncStatus('def', 'terjadwal')">
                                <label for="scheduled-def" class="status-label">📋 Terjadwal</label>
                            </div>
                            <div class="status-option">
                                <input type="radio" id="completed-def" name="status-def" value="selesai"
                                    onclick="syncStatus('def', 'selesai')">
                                <label for="completed-def" class="status-label">✅ Selesai</label>
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

<div style="margin-bottom: 14rem;">
</div>
<script>
    function tampilkanID() {
        const select = document.getElementById('user_id');
        const selectedId = select.value;

        document.getElementById('nimTambah').value = selectedId;
    }

    function syncStatus(id, status) {
        // Mapping status ke id radio group kedua
        const map = {
            'pending': `pending-${id}`,
            'terjadwal': `scheduled-${id}`,
            'selesai': `completed-${id}`
        };

        // Cek dan set radio kedua
        const radio2 = document.getElementById(map[status]);
        if (radio2) radio2.checked = true;

        // Ubah warna label aktif (untuk kedua grup)
        updateLabelHighlight(`status-options-${id}`, status);
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
                label.style.fontWeight = 'bold'; ''
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

    document.addEventListener("DOMContentLoaded", function () {
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
            radio.addEventListener("change", function () {
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
    document.getElementById('modalOverlay-skripsi').addEventListener('click', function (e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>

<script>
    function populateAndOpenEditModal(button) {
        const id = button.getAttribute('data-id');
        const modal = document.getElementById(`modalOverlayEdit${id}`);
        
        // Ambil semua data dari atribut tombol
        const nama = button.getAttribute('data-nama');
        const nim = button.getAttribute('data-nim');
        const judul = button.getAttribute('data-judul');
        const penguji1 = button.getAttribute('data-penguji1');
        const penguji1_id = button.getAttribute('data-penguji1-id');
        const penguji2 = button.getAttribute('data-penguji2');
        const penguji2_id = button.getAttribute('data-penguji2-id');
        const jadwal_mulai = button.getAttribute('data-jadwal-mulai');
        const jadwal_selesai = button.getAttribute('data-jadwal-selesai');
        const tempat = button.getAttribute('data-tempat');
        const tempat_id = button.getAttribute('data-tempat-id');
        const status = button.getAttribute('data-status');

        // Isi form input di modal
        modal.querySelector('[name="nama_mhs"]').value = nama;
        modal.querySelector('[name="nim"]').value = nim;
        modal.querySelector('[name="judul"]').value = judul;
        modal.querySelector('[name="pembimbing1"]').value = penguji1;
        modal.querySelector('[name="pembimbing2"]').value = penguji2;
        modal.querySelector('[name="jadwal_mulai"]').value = jadwal_mulai;
        modal.querySelector('[name="jadwal_selesai"]').value = jadwal_selesai;
        modal.querySelector('[name="ruang_sidang"]').value = tempat;
        modal.querySelector('#def_p1').value = penguji1_id;
        modal.querySelector('#def_p2').value = penguji2_id;
        modal.querySelector('#def_tempat').value = tempat_id;

        console.log(modal.querySelector('[name="nama_mhs"]'))
        // Atur radio button status
        modal.querySelectorAll('input[name="status"]').forEach(radio => {
            radio.checked = (radio.value === status);
        });

        // Terakhir: Tampilkan modal
        openModalEdit(id);
    }

    function openModalEdit(id_data) {
        const modal = document.getElementById(`modalOverlayEdit${id_data}`);
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModalEdit(id_data) {
        const modal = document.getElementById(`modalOverlayEdit${id_data}`);
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
    document.getElementById('modalOverlayEdit').addEventListener('click', function (e) {
        if (e.target === this) {
            closeModalEdit();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModalEdit();
        }
    });
</script>
@endsection