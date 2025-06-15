@extends('dashboard.admin.master')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">Jadwal Sidang Skripsi</h1>
                        <p class="text-gray-600">Kelola dan pantau jadwal sidang mahasiswa</p>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="bg-white px-4 py-2 rounded-lg shadow-sm border">
                            <span class="text-sm text-gray-500">Total Sidang</span>
                            <p class="text-2xl font-bold text-blue-600">{{ count($skripsis) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex items-center space-x-2">
                    <div class="relative">
                        <input type="text" placeholder="Cari mahasiswa atau judul..."
                            class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 w-64">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <select class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="terjadwal">Terjadwal</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <a href="" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Jadwal Sidang
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mahasiswa</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Judul Skripsi</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Pembimbing</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ruangan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jadwal</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($skripsis as $index => $skripsi)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold">
                                            {{ $index + 1 }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white font-semibold">
                                                    {{ substr($skripsi->mahasiswa->name, 0, 2) }}
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">{{ $skripsi->mahasiswa->name }}</div>
                                                <div class="text-sm text-gray-500">Mahasiswa</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 font-medium max-w-xs">
                                            {{ Str::limit($skripsi->judul, 60) }}
                                        </div>
                                        @if(strlen($skripsi->judul) > 60)
                                            <button class="text-xs text-blue-600 hover:text-blue-800 mt-1">Lihat selengkapnya</button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="space-y-1">
                                            <div class="text-sm text-gray-900">
                                                <span class="font-medium">P1:</span> {{ $skripsi->pembimbing1->name }}
                                            </div>
                                            <div class="text-sm text-gray-900">
                                                <span class="font-medium">P2:</span> {{ $skripsi->pembimbing2->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-gray-900">{{ $skripsi->ruang->nama_ruang }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="space-y-1">
                                            <div class="flex items-center text-sm text-gray-900">
                                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($skripsi->jadwal_mulai)->format('d M Y') }}
                                            </div>
                                            <div class="flex items-center text-sm text-gray-600">
                                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($skripsi->jadwal_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($skripsi->jadwal_selesai)->format('H:i') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $statusConfig = [
                                                'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'dot' => 'bg-yellow-400', 'label' => 'Pending'],
                                                'terjadwal' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'dot' => 'bg-blue-400', 'label' => 'Terjadwal'],
                                                'selesai' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'dot' => 'bg-green-400', 'label' => 'Selesai']
                                            ];
                                            $config = $statusConfig[$skripsi->status] ?? $statusConfig['pending'];
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                            <span class="w-2 h-2 {{ $config['dot'] }} rounded-full mr-2 animate-pulse"></span>
                                            {{ $config['label'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button onclick="openModal('{{ $skripsi->id }}', '{{ addslashes($skripsi->judul) }}')"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 hover:text-blue-700 transition-all duration-200 transform hover:scale-105">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <form action="{{ route('skripsi.destroy', $skripsi->id) }}" method="POST" class="inline-block"
                                                onsubmit="return confirm('Yakin mau hapus jadwal sidang ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 hover:text-red-700 transition-all duration-200 transform hover:scale-105">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada jadwal sidang</h3>
                                            <p class="text-gray-500 mb-4">Mulai tambahkan jadwal sidang untuk mahasiswa</p>
                                            <a href="" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Tambah Jadwal
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Enhanced Modal -->
            <div id="editModal" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center hidden z-50 transition-all duration-300">
                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 transform transition-all duration-300 scale-95" id="modalContent">
                    <div class="flex items-center justify-between p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900">Edit Jadwal Sidang</h2>
                        <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-200">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <form id="editForm" method="POST" class="p-6">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Skripsi</label>
                                <textarea id="judulInput" name="judul" rows="3"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none transition-all duration-200"
                                    placeholder="Masukkan judul skripsi..." required></textarea>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 mt-6">
                            <button type="button" onclick="closeModal()"
                                class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 font-medium transition-all duration-200 transform hover:scale-105">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 font-medium transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(id, judul) {
            document.getElementById('editForm').action = `/skripsi/${id}`;
            document.getElementById('judulInput').value = judul;
            const modal = document.getElementById('editModal');
            const modalContent = document.getElementById('modalContent');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('bg-opacity-60');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('editModal');
            const modalContent = document.getElementById('modalContent');
            
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            modal.classList.remove('bg-opacity-60');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal when clicking outside
        document.getElementById('editModal').addEventListener('click', function(e) {
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

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .group:hover .transform {
            transform: scale(1.02);
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: .5; }
        }
    </style>

@endsection