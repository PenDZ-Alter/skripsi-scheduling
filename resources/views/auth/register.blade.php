@extends('dashboard.masterAuth')

@section('title', 'Registrasi')

@section('content')
<div class="register-box">
    <h2>Form Registrasi</h2>
    <form action="{{ route('register.storeInitial') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" required />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" required />
        </div>
        <button type="submit" class="register-btn">Daftar</button>
        <p class="signup-link">Sudah punya akun? <a href="{{ route('login') }}">Login Sekarang</a></p>
    </form>
</div>
@endsection
