@extends('dashboard.masterAuth')

@section('title', 'Registrasi')

@section('content')
<div class="register-box">
    <h2 class="title-register-1">Registrasi</h2>
    <h2 class="title-register">Langkah 1 dari 2</h2>

    <div class="progress-wrapper">
        <div class="progress-bar">
            <div class="step current"></div>
            <div class="step"></div>
        </div>
    </div>

    <form action="{{ route('register.storeInitial') }}" method="POST">
        @csrf

        <div class="input-group">
            <label for="name">Nama Lengkap</label>
            <div class="input-icon">
                <i class="fas fa-user user-icon"></i>
                <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda" required autofocus />
            </div>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <div class="input-icon">
                <i class="fas fa-envelope envelope-icon"></i>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda"  required />
            </div>
        </div>

        <div class="input-group">
            <label for="password">Kata Sandi</label>
            <div class="input-icon">
                <i class="fas fa-lock lock-icon"></i>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Anda" required />
                <i class="fa fa-eye toggle-eye" onclick="togglePassword()"></i>
            </div>
        </div>

        <button type="submit" class="register-btn">Lanjutkan</button>
        <p class="signup-link">Sudah punya akun? <a href="{{ route('login') }}">Login Sekarang</a></p>
    </form>
</div>
@endsection
