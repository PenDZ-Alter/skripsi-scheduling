@extends('dashboard.admin.master')

@section('content')
    <div class="container mt-4">
        @foreach ($mahasiswa->chunk(3) as $group)
            <div class="horizontal-card-scroll mb-3">
                @foreach ($group as $mhs)
                    <div class="profile-page-card">
                        <img src="https://png.pngtree.com/png-clipart/20200224/original/pngtree-cartoon-color-simple-male-avatar-png-image_5230557.jpg"
                            class="card-img-top" alt="Foto Mahasiswa">
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
                        <div class="modal-dialog modal-dialog-centered">
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
                                        <span class="profile-badge">Student</span>
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
