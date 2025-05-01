@extends('auth.master')

@section('title', 'Registrasi')

@section('content')

    <div class="register-box">
        <h2 class="title-register-1">Registrasi</h2>
        <h2 class="title-register">Langkah 2 dari 2</h2>

        <div class="progress-wrapper">
            <div class="progress-bar">
                <div class="step completed"></div>
                <div class="step current"></div>
            </div>
        </div>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="jenis_kelamin">Jenis Kelamin Anda</label>
                <div class="input-icon">
                    <i class="fas fa-user user-icon"></i>
                    <select name="jenis_kelamin" required autofocus>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="lk">Laki-laki</option>
                        <option value="pr">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <label for="no_telp">Nomor HP Anda</label>
                <div class="input-icon">
                    <i class="fas fa-mobile-screen-button mobile-icon"></i>
                    <input type="number" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Anda" required autofocus>
                </div>
            </div>
            <div class="input-group">
                <label for="alamat">Alamat Anda</label>
                <div class="input-icon">
                    <i class="fas fa-location-dot location-icon"></i>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required autofocus>
                </div>
            </div>
            <div class="input-group">
                <label for="nama_ortu">Nama Orang Tua</label>
                <div class="input-icon">
                    <i class="fas fa-user-tie user-icon"></i>
                    <input type="text" id="nama_ortu" name="nama_ortu" placeholder="Masukkan Nama Ortu Anda" required autofocus>
                </div>
            </div>
            <div class="input-group">
                <label for="domisili_ortu">Domisili Orang Tua</label>
                <div class="input-icon">
                    <i class="fas fa-house-chimney location-icon"></i>
                    <input type="text" id="domisili_ortu" name="domisili_ortu"  placeholder="Masukkan Alamat Ortu Anda" required autofocus>
                </div>
            </div>
            <button type="submit" class="register-btn">Daftar</button>
            <p class="signup-link">Apakah anda ingin membatalkan? <a href="{{ route('login') }}">Kembali</a></p>
        </form>
    </div>

@endsection
