@extends('dashboard.admin.master')

@section('content')
    <div class="container">
        <!-- Wrapper Dashboard + Menu -->
        <div class="top-section">
            <!-- Dashboard Section -->
            <div class="dashboard-wrapper">
                <div class="dashboard">
                    <div class="box green">
                        <i class="fas fa-check-circle"></i>
                        <h3><span style="font-weight: bold;">{{ $totalmahasiswa }}</span> Mahasiswa Aktif</h3>
                    </div>
                    <div class="box red">
                        <i class="fas fa-minus-circle"></i>
                        <h3><span style="font-weight: bold;">{{ $hasil = ($totalmahasiswa >= 7) ? $totalmahasiswa * 4 : $totalmahasiswa * 1; }}</span> Mahasiswa Non-Aktif</h3>
                    </div>
                    <div class="box yellow">
                        <i class="fas fa-sign-out-alt"></i>
                        <h3><span style="font-weight: bold;">{{ $hasil = ($totalmahasiswa >= 1) ? $totalmahasiswa/$totalmahasiswa: $totalmahasiswa; }}</span> Mahasiswa Cuti</h3>
                    </div>
                    <div class="box blue">
                        <i class="fas fa-graduation-cap"></i>
                        <h3><span style="font-weight: bold;">{{ $hasil = ($totalmahasiswa >= 1) ? $totalmahasiswa * 100 : $totalmahasiswa * 50; }}</span> Mahasiswa Lulus</h3>
                    </div>
                </div>
            </div>

            <!-- Menu Section -->
            <div class="menu">
                <h3>MENU</h3>

                <!-- Menu Profile -->
                <a href="{{ route('adm.profile') }}" class="menu-item" style="text-decoration: none; color: inherit;">
                    <div class="avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="menu-text">Profile Mahasiswa</span>
                </a>

                <!-- Menu Jadwal -->
                <a href="{{ route('adm.jadwal') }}" class="menu-item" style="text-decoration: none; color: inherit;">
                    <div class="avatar">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span class="menu-text">Jadwal Sidang</span>
                </a>
            </div>

        </div>

        <!-- Quotes -->
        <div class="background-quotes fade-in-up">
            <blockquote class="quotes-description">"Orang yang hebat adalah mereka yang bersyukur, mengucapkan terima kasih,
                dan melihat kebaikan dalam orang lain, bukan fokus pada kesalahan mereka."</blockquote>
            <span class="quotes-end">🌄 Positive Quotes</span>
        </div>

        <div style="margin-bottom: 10rem;">
        </div>
    </div>
@endsection
