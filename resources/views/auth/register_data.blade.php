@extends('dashboard.masterAuth')

@section('title', 'Registrasi')

@section('content')

    <div class="register-box">
        <h2>Form Registrasi Data Lanjutan</h2>
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin Anda</label>
                <select name="jenis_kelamin" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="lk">Laki-laki</option>
                    <option value="pr">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor HP Anda</label>
                <input type="number" id="no_telp" name="no_telp" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Anda</label>
                <input type="text" id="alamat" name="alamat" required />
            </div>
            <div class="form-group">
                <label for="nama_ortu">Nama Orang Tua</label>
                <input type="text" id="nama_ortu" name="nama_ortu" required />
            </div>
            <div class="form-group">
                <label for="domisili_ortu">Domisili Orang Tua</label>
                <input type="text" id="domisili_ortu" name="domisili_ortu" required />
            </div>
            <button type="submit" class="register-btn">Daftar</button>
            <p class="signup-link">Apakah anda ingin membatalkan? <a href="{{ route('login') }}">Kembali</a></p>
        </form>
    </div>

@endsection
