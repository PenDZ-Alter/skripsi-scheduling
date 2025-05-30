@extends('dashboard.mahasiswa.master')

@section('content')
    <!-- Grid 2 Kolom -->
    <div>
        <div class="profile-page-card fade-in-up">
            <!-- Konten -->
            <div class="tabs">
                <button class="active" id="tabTranskrip"><i class="fa fa-address-card"></i>&nbsp;Profile Mahasiswa</button>
                <button id="tabRiwayatKHS"><i class="fas fa-user-circle"></i>&nbsp;Profile Singkat Mahasiswa</button>
            </div>

            <!-- Tabel Transkrip -->
            <div class="tab-content active" id="cardTranskrip">
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

                    <!-- Info Box (Disamakan posisinya) -->
                    <div class="info-box-profiles">
                        <div class="space-y-2">
                            {{-- Data rows --}}
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Angkatan</span></div>
                                <div class="col-9 value-profile border-bottom">2022</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>NIM</span></div>
                                <div class="col-9 value-profile border-bottom">{{ $user->id }}</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Nama Mahasiswa</span></div>
                                <div class="col-9 value-profile border-bottom">{{ $user->name }}</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Status Studi</span></div>
                                <div class="col-9 value-profile border-bottom-indicator">
                                    <span class="status-indicator-profile"></span> <span
                                        class="beside-status-profile">Mahasiswa
                                        Aktif</span>
                                </div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Semester</span></div>
                                <div class="col-9 value-profile border-bottom">VI (Enam)</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Tempat Lahir</span></div>
                                <div class="col-9 value-profile border-bottom">MALANG</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Tanggal Lahir</span></div>
                                <div class="col-9 value-profile border-bottom">01 Januari 2007</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Email Pribadi</span></div>
                                <div class="col-9 value-profile border-bottom">{{ $user->email }}</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Asal Kota</span></div>
                                <div class="col-9 value-profile border-bottom">{{ $user->alamat }}</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Nama Orang Tua</span></div>
                                <div class="col-9 value-profile border-bottom">{{ $user->nama_ortu }}</div>
                            </div>
                            <div class="row-profile mb-2">
                                <div class="col-3 label-profile"><span>Alamat Orang Tua</span></div>
                                <div class="col-9 value-profile border-bottom">{{ $user->domisili_ortu }}</div>
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
            <div class="tab-content-two zoom-in" id="cardRiwayat" style="display: none">
                <h3 class="Card-ShortProfile-Header">Profile Singkat Anda</h3>
                <ul class="Card-ShortProfile-Content">
                    <li>Nama Panggilan : <span class="id">{{ $user->name }}</span></li>
                    <li>Nama Lengkap Non Gelar : <span class="id">{{ $user->name }}</span></li>
                    <li>Program Studi : <span class="id">Teknik Informatika</span></li>
                    <li>Nama Orang Tua : <span class="id">{{ $user->nama_ortu }}</span></li>
                    <li>Email : <span class="id">{{ $user->email }}</span></li>
                    <li>Status Email : <span class="status-indicator-profile"></span> <span
                            class="beside-status-profile">Email
                            Aktif</span></li>
                </ul>
                <p class="Card-ShortProfile-Footer">
                    Pertanyaan lainnya bisa diajukan di website
                    <a href="https://saintek.uin-malang.ac.id/helpdesk-saintek/" target="_blank">Helpdesk Saintek UIN
                        Malang</a>
                </p>
            </div>
        </div>
        <div style="padding-bottom: 18rem;">
        </div>
    </div>
@endsection
