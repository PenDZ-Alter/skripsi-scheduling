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
                        <h3>1200 Mahasiswa Aktif</h3>
                    </div>
                    <div class="box red">
                        <i class="fas fa-minus-circle"></i>
                        <h3>54 Mahasiswa Non-Aktif</h3>
                    </div>
                    <div class="box yellow">
                        <i class="fas fa-sign-out-alt"></i>
                        <h3>200 Mahasiswa Cuti</h3>
                    </div>
                    <div class="box blue">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>438 Mahasiswa Lulus</h3>
                    </div>
                </div>
            </div>

            <!-- Menu Section -->
            <div class="menu">
                <h3>MENU</h3>

                <div class="menu-item">
                    <div class="avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="menu-text">Profile Mahasiswa</span>
                </div>

                <div class="menu-item">
                    <div class="avatar">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span class="menu-text">Jadwal Sidang</span>
                </div>
            </div>
        </div>

        <!-- Quotes Section -->
        <div class="quotes">
            <h3>Quotes</h3>
            <p>Orang yang hebat adalah mereka yang bersyukur, mengucapkan terima kasih,<br>
                dan melihat kebaikan dalam orang lain, bukan fokus pada kesalahan mereka.</p>
        </div>
    </div>
@endsection
