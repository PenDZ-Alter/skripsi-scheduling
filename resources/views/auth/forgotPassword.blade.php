@extends('auth.master')

@section('title', 'forgotPassword')

@section('content')
    <div class="register-box">
        <h2 class="title-register">Ubah Password anda</h2>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Email</label>
                <div class="input-icon">
                    <i class="fas fa-envelope envelope-icon"></i>
                    <input type="text" id="email" name="email" placeholder="Masukkan Username" required autofocus>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-icon">
                    <i class="fas fa-lock lock-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required
                        autofocus>
                    <i class="fa fa-eye toggle-eye" onclick="togglePassword()"></i>
                </div>
            </div>
            <button type="submit" class="login-btn">Login</button>
            <p class="forgot-link">Lupa Password? <a href="{{ route('forgotPasswordPage') }}">Ubah Password</a></p>
            <p class="signup-link">Belum punya akun? <a href="{{ route('registerpage') }}">Daftar Sekarang</a></p>
        </form>
    </div>
@endsection
