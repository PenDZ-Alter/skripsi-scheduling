@extends('dashboard.admin.master')

@section('content')

<div class="container">
    <!-- Dashboard Section -->
    <div class="dashboard">
        <div class="box green">
            <i class="fas fa-check-circle"></i>
            <h3>1200 Mahasiswa Aktif</h3>
        </div>
        <div class="box red">
            <i class="fas fa-times-circle"></i>
            <h3>54 Mahasiswa Non-Aktif</h3>
        </div>
        <div class="box yellow">
            <i class="fas fa-arrow-left"></i>
            <h3>200 Mahasiswa Cuti</h3>
        </div>
        <div class="box blue">
            <i class="fas fa-graduation-cap"></i>
            <h3>438 Mahasiswa Lulus</h3>
        </div>
    </div>

    <!-- Menu Section -->
    <div class="menu">
        <h3>MENU</h3>
        <div class="menu-item">
            <i class="fas fa-user"></i> Profile 1
        </div>
        <div class="menu-item">
            <i class="fas fa-user"></i> Profile 2
        </div>
        <div class="menu-item">
            <i class="fas fa-user"></i> Profile 3
        </div>
        <div class="menu-item">
            <i class="fas fa-user"></i> Profile 4
        </div>
        <div class="menu-item">
            <i class="fas fa-user"></i> Profile 5
        </div>
    </div>

    <!-- Quotes Section -->
    <div class="quotes">
        <h3>Quotes</h3>
        <p>Orang yang hebat adalah mereka yang bersyukur, mengucapkan terima kasih, dan melihat kebaikan dalam orang lain, bukan fokus pada kesalahan mereka.</p>
    </div>

</div>

@endsection
