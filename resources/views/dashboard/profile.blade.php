@extends('dashboard.master')

@section('content')
    <!-- Grid 2 Kolom -->
    <div class="profile-page-card">
        <!-- Konten -->
        <div class="grid-cols-2 md:grid-cols-4 content-Card-profile">
            <!-- Kolom Kiri: Info Profil -->
            <div class="space-x-4 card-Profile">
                <!-- Pembungkus foto dan icon -->
                <div class="profile-wrapper-page">
                    <!-- Foto profil -->
                    <div class="profile-Image-background-page">
                        <img class="min-w-1 min-h-0.5" id="profileImage" src="{{ asset('storage/img/Alfariz.png') }}"
                            alt="Foto Profil" class="profile-image-page">
                    </div>
                </div>

                <!-- Bagian informasi -->
                <div class="info-box-profiles">
                    <div class="space-y-2">
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Angkatan</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                2022
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>NIM</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user->id }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Nama Mahasiswa</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Status Studi</span>
                            </div>
                            <div class="col-9 value border-bottom-indicator">
                                <span class="status-indicator-profile"></span> <span class="beside-status-profile">Mahasiswa
                                    Aktif</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 label-profile">
                                <span>Semester</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                VI (Enam)
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Tempat Lahir</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                MALANG
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Tanggal Lahir</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                01 Januari 2007
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Email Pribadi</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Asal Kota</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user->alamat }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Nama Orang Tua</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user->nama_ortu }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Alamat Orang Tua</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user->domisili_ortu }}
                            </div>
                        </div>
                        <div class="row-profile mb-2">
                            <div class="col-3 label-profile">
                                <span>Provinsi Orang Tua</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                Jawa Timur
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 label-profile">
                                <span>Kota Orang Tua</span>
                            </div>
                            <div class="col-9 value-profile border-bottom">
                                {{ $user->domisili_ortu }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Tombol Edit -->
                <div class="bg-btn-profile">
                    <div class="space-y-2">
                        <a href="{{ url('/profileEdit') }}" class="btn-edit-profile">
                            <i class="fas fa-pen-to-square" class="btn-pen-edit"></i>
                            <span class="btn-text-edit">Ubah Profil Saya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
