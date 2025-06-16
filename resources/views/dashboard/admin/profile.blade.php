@extends('dashboard.admin.master')

@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @foreach ($mahasiswa->chunk(4) as $group)
            <div class="horizontal-card-scroll mb-3">
                @foreach ($group as $mhs)
                    <div class="profile-page-card">
                        <img src="https://png.pngtree.com/png-clipart/20200224/original/pngtree-cartoon-color-simple-male-avatar-png-image_5230557.jpg"
                            class="card-img-top" alt="Foto Mahasiswa">
                        
                        <!-- Status Badge -->
                        <div class="status-badge-container">
                            @if($mhs->is_ready)
                                <span class="badge bg-success status-badge">
                                    <i class="fas fa-check-circle"></i> Terverifikasi
                                </span>
                            @else
                                <span class="badge bg-warning text-dark status-badge">
                                    <i class="fas fa-clock"></i> Belum Verifikasi
                                </span>
                            @endif
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $mhs->name }}</h5>
                            <p class="card-text">
                                <strong>Email:</strong> {{ $mhs->email }}<br>
                                <strong>No. Telp:</strong> {{ $mhs->no_telp }}<br>
                                <strong>Jenis Kelamin:</strong>
                                {{ $mhs->jenis_kelamin == 'lk' ? 'Laki-laki' : 'Perempuan' }}<br>
                                <strong>Alamat:</strong> {{ $mhs->alamat }}<br>
                            </p>
                            <button class="btn btn-primary btn-detail" data-bs-toggle="modal"
                                data-bs-target="#modalMhs{{ $mhs->id }}">
                                <i class="fas fa-magnifying-glass"></i>
                                Lihat Detail
                            </button>
                        </div>
                    </div>

                    <!-- Modern Modal -->
                    <div class="modal fade" id="modalMhs{{ $mhs->id }}" tabindex="-1"
                        aria-labelledby="modalMhsLabel{{ $mhs->id }}" aria-hidden="true">
                        <div class="modal-overlay"></div> 
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>

                                <div class="modal-body">
                                    <!-- Profile Section -->
                                    <div class="profile-section">
                                        <img src="{{ asset('storage/img/UserImage.png') }}" alt="Foto Mahasiswa"
                                            class="profile-avatar">
                                        <h4 class="profile-name">{{ $mhs->name }}</h4>
                                        <div class="badge-container">
                                            <span class="profile-badge action-badge">Student</span>
                                            @if($mhs->is_ready)
                                                <span class="profile-badge verification-badge verified">
                                                    <i class="fas fa-check-circle"></i> Terverifikasi
                                                </span>
                                            @else
                                                <span class="profile-badge verification-badge pending">
                                                    <i class="fas fa-clock"></i> Belum Verifikasi
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Verification Status Card -->
                                    <div style="margin-bottom: 1rem;" class="verification-status-card mb-3">
                                        <div class="status-header">
                                            <i class="fas fa-graduation-cap"></i>
                                            <span>Status Kelayakan Sidang</span>
                                        </div>
                                        <div class="status-content">
                                            @if($mhs->is_ready)
                                                <div class="status-ready">
                                                    <i class="fas fa-check-circle text-success"></i>
                                                    <span>Mahasiswa sudah memenuhi syarat untuk sidang (Semhas/Sempro)</span>
                                                </div>
                                            @else
                                                <div class="status-not-ready">
                                                    <i class="fas fa-exclamation-triangle text-warning"></i>
                                                    <span>Mahasiswa belum memenuhi syarat untuk sidang</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Info Cards -->
                                    <div class="info-cards">
                                        <div class="info-card">
                                            <div class="info-icon email">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="info-content">
                                                <div class="info-label">Email</div>
                                                <div class="info-value">{{ $mhs->email }}</div>
                                            </div>
                                        </div>

                                        <div class="info-card">
                                            <div class="info-icon phone">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="info-content">
                                                <div class="info-label">No. Telp</div>
                                                <div class="info-value">{{ $mhs->no_telp }}</div>
                                            </div>
                                        </div>

                                        <div class="info-card">
                                            <div class="info-icon gender">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="info-content">
                                                <div class="info-label">Jenis Kelamin</div>
                                                <div class="info-value">
                                                    {{ $mhs->jenis_kelamin == 'lk' ? 'Laki-laki' : 'Perempuan' }}</div>
                                            </div>
                                        </div>

                                        <div class="info-card">
                                            <div class="info-icon address">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="info-content">
                                                <div class="info-label">Alamat</div>
                                                <div class="info-value">{{ $mhs->alamat }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="action-buttons">
                                        <!-- Form Verifikasi -->
                                        <form action="{{ route('admin.mahasiswa.verifikasi', $mhs->id) }}" method="POST" 
                                              style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn-action btn-verify" 
                                                    onclick="return confirm('{{ $mhs->is_ready ? 'Yakin mau batalkan verifikasi ' . $mhs->name . '?' : 'Yakin mau verifikasi ' . $mhs->name . '? Pastikan mahasiswa sudah semhas/sempro!' }}')">
                                                @if($mhs->is_ready)
                                                    <i class="fas fa-times-circle"></i>
                                                    Batalkan Verifikasi
                                                @else
                                                    <i class="fas fa-check-circle"></i>
                                                    Verifikasi Mahasiswa
                                                @endif
                                            </button>
                                        </form>

                                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin mau hapus data ini?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>



    <style>
        .status-badge-container {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 15px;
        }

        .badge-container {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 0.5rem;
        }

        .verification-badge.verified {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        .verification-badge.pending {
            background: linear-gradient(135deg, #ffc107, #fd7e14);
            color: #212529;
        }

        .verification-status-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 10px;
            padding: 1rem;
            border-left: 4px solid #007bff;
        }

        .status-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .status-content {
            margin-left: 1.5rem;
        }

        .status-ready, .status-not-ready {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .btn-verify {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-verify:hover {
            background: linear-gradient(135deg, #218838, #1fa188);
            transform: translateY(-1px);
        }

        .verification-confirmation {
            text-align: center;
        }

        .verification-confirmation i {
            font-size: 3rem;
        }

        .profile-page-card {
            position: relative;
        }

        /* Custom scrollbar untuk modal */
        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }

        .modal-body::-webkit-scrollbar {
            width: 6px;
        }

        .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-body::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-radius: 10px;
        }

        .modal-body::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #0056b3, #004085);
        }

        /* Untuk Firefox */
        .modal-body {
            scrollbar-width: thin;
            scrollbar-color: #007bff #f1f1f1;
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .modal-dialog {
                margin: 10px;
                max-width: calc(100% - 20px);
            }
            
            .modal-body {
                max-height: 60vh;
                padding: 1rem 0.75rem;
            }
            
            .info-cards {
                gap: 0.75rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Matikan semua modal biar gak auto muncul
            document.querySelectorAll('.modal').forEach((modalEl) => {
                modalEl.classList.remove('show');
                modalEl.style.display = 'none';
                modalEl.setAttribute('aria-hidden', 'true');
            });

            // Optional: bersihin fragment # dari URL
            if (window.location.hash.startsWith('#modalMhs')) {
                history.replaceState(null, null, ' ');
            }
        });
    </script>
@endsection