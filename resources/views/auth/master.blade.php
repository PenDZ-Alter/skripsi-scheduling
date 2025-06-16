<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <img src="{{ asset('storage/img/UIN-2.1.png') }}" alt="Logo UIN" class="Image-title">
    <link href="{{ asset('storage/css/RegisterPage.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/LoginPage.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>@yield('title') | .:: Siakad Informasi Akademik Universitas</title>
</head>

<body>
    <div class="title-registerpage">
        <h2>SISTEM INFORMASI AKADEMIK (SIAKAD)</h2>
    </div>

    <div class="title-info" data-bs-toggle="modal" data-bs-target="#infoModal" style="cursor: pointer;">
        <i class="fas fa-info-circle me-2"></i>
        <p>Informasi Mahasiswa</p>
    </div>

    <!-- Enhanced Modal -->
    <div style="display: none;" class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content glass-modal">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="infoModalLabel">
                        <i class="fas fa-graduation-cap"></i>
                        Informasi Mahasiswa
                    </h5>
                </div>

                <div class="modal-body">
                    <div class="info-section">
                        <h6 class="section-title">📚 Info Mahasiswa</h6>
                        <ul class="section-list">
                            <li>Kode akses Siakad & Hotspot menggunakan akses terakhir login. Disarankan mengganti tiap semester.</li>
                            <li>Fasilitas hanya aktif saat status aktif/herregistrasi.</li>
                            <li>Wisuda per periode (kuota 800). Mahasiswa yudisium wajib daftar wisuda online.</li>
                            <li>Pembayaran akademik melalui Bank Mandiri, BSI, BRI, BTN, BTNS, dan BNI.</li>
                        </ul>
                    </div>
                    
                    <div class="info-section">
                        <h6 class="section-title">🚀 Layanan Baru</h6>
                        <ul class="section-list">
                            <li>Aktivasi Email UIN untuk Dosen & Mahasiswa via laman utama Siakad.</li>
                            <li>Surat Akademik: <a href="https://akademik.uin-malang.ac.id" target="_blank">akademik.uin-malang.ac.id</a></li>
                            <li>Keuangan Mahasiswa: <a href="https://studentfinance.uin-malang.ac.id" target="_blank">studentfinance.uin-malang.ac.id</a></li>
                        </ul>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-tutup" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>


    @yield('content')

    @include('auth.footer')

    <script type="text/javascript" src="storage/js/toggle-login.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>

</html>
