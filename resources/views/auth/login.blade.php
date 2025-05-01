@extends('dashboard.masterAuth')

@section('title', 'Login')

@section('content')
<section class="login-section">
    <div class="login-container">
        <h2>Masuk ke Akun Anda</h2>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Email</label>
                <input type="text" id="email" name="email" placeholder="Masukkan Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
            <p class="signup-link">Belum punya akun? <a href="{{ route('registerpage') }}">Daftar Sekarang</a></p>
        </form>
    </div>
</section>
@endsection
