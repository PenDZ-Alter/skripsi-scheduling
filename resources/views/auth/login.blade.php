@extends('auth.master')
@section('title', 'Login')
@section('content')

    <div class="title-info" data-bs-toggle="modal" data-bs-target="#infoModal" style="cursor: pointer;">
        <i class="fas fa-info-circle me-2"></i>
        <p>Informasi Mahasiswa</p>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">
                        <i class="fas fa-info-circle me-2"></i>Informasi Mahasiswa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div style="color: #FFFF" class="col-md-6">
                            <h5>Info Mahasiswa</h5>
                            <ol>
                                <li>Kode akses Siakad dan Hotspot menggunakan kode akses terakhir login. Disarankan mengubah
                                    kode akses setiap semester melalui fitur edit password.</li>
                                <li>Fasilitas Siakad dan Hotspot hanya bisa digunakan saat status aktif/herregistrasi.</li>
                                <li>Wisuda dilaksanakan setiap periode (kuota 800). Mahasiswa yudisium wajib daftar wisuda
                                    online untuk mendapatkan kuota.</li>
                                <li>Pembayaran Akademik dapat dilakukan di Bank Mandiri, BSI, BRI, BTN, BTNS dan BNI.</li>
                            </ol>
                        </div>
                        <div style="color: #FFFF" class="col-md-6">
                            <h5>Layanan Baru</h5>
                            <ol>
                                <li>Aktivasi Email UIN untuk Dosen & Mahasiswa melalui laman utama Siakad</li>
                                <li>Layanan Surat Akademik: akademik.uin-malang.ac.id</li>
                                <li>Layanan Administrasi Keuangan Mahasiswa: studentfinance.uin-malang.ac.id</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="register-box">
        <h2 class="title-register">Masuk ke Akun Anda</h2>
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

@section('scripts')
@parent
<script>
    // Add this script to prevent initial show
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('infoModal'), {
            keyboard: false
        });
        
        // Explicitly hide the modal on page load
        myModal.hide();
        
        // Clean up any backdrop elements
        const backdrops = document.getElementsByClassName('modal-backdrop');
        while(backdrops.length > 0) {
            backdrops[0].parentNode.removeChild(backdrops[0]);
        }
        
        // Remove body class if present
        document.body.classList.remove('modal-open');
    });
</script>
@endsection
