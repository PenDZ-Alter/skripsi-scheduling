<div class="fixed top-0 left-0 w-64 h-screen text-white flex flex-col z-50">
    <!-- Bagian Logo atau Profil Sidebar -->
    <div class="flex items-center p-4 bg-gradient-to-r">
        <a href="{{ route('mhs.home') }}"><i class="fas fa-laptop icon-left"></i></a>
        <span class="title-left">Skripsi</span>
        <span class="title-right"><a href="{{ route('mhs.home') }}">UINMALANG</a></span>
    </div>

    <!-- Informasi Mahasiswa -->
    <span class="profil flex items-center justify-between">
        <div class="flex flex-col">
            <div class="name-profile">{{ $user['name'] }}</div>
            <div class="iconName-profile">{{ $user['id'] }}</div>
        </div>
        <!-- Ikon di sebelah kanan -->
        <a href="{{ route('login') }}">
            <i class="fas fa-right-from-bracket icon-style2"></i></a>
    </span>

    <!-- Menu -->
    <nav class="flex-1 overflow-y-auto">
        <ul>
            <li style="padding-inline: 24px;" class="py-1">
                <span class="sidebar-content">
                    <a href="{{ route('mhs.home') }}">
                        <i class="fas fa-house icon-style"></i>
                    </a>
                    <a href="{{ route('mhs.home') }}" class="text-style">Home</a>
                </span>
            </li>
            <li style="padding-inline: 24px;" class="py-1">
                <span class="sidebar-content">
                    <a href="{{ route('mhs.profile') }}">
                        <i class="fa-regular fa-address-card icon-style"></i>
                    </a>
                    <a href="{{ route('mhs.profile') }}" class="text-style">Profil Mahasiswa</a>
                </span>
            </li>
            <li style="padding-inline: 24px;" class="py-1">
                <span class="sidebar-content">
                    <a href="{{ route('mhs.pembayaran') }}">
                        <i class="fa-regular fa-credit-card icon-style"></i>
                    </a>
                    <a href="{{ route('mhs.pembayaran') }}" class="text-style">Pembayaran</a>
                </span>
            </li>
            <li style="padding-inline: 24px;" class="py-1">
                <span class="sidebar-content">
                    <a href="{{ route('mhs.studi') }}">
                        <i class="fa-regular fa-newspaper icon-style"></i>
                    </a>
                    <a href="{{ route('mhs.studi') }}" class="text-style">KHS Hasil Studi</a>
                </span>
            </li>
            <li style="padding-inline: 24px;" class="py-1">
                <span class="sidebar-content">
                    <a href="{{ route('mhs.statistik') }}">
                        <i class="fas fa-chart-line icon-style"></i>
                    </a>
                    <a href="{{ route('mhs.statistik') }}" class="text-style">Statistik</a>
                </span>
            </li>
            <li style="padding-inline: 24px;" class="py-1">
                <span class="sidebar-content">
                    <a href="{{ route('mhs.transkrip') }}">
                        <i class="fa-regular fa-file icon-style"></i></a>
                    <a href="{{ route('mhs.transkrip') }}" class="text-style">Transkrip</a>
                </span>
            </li>
            <li style="padding-inline: 24px;" class="py-1">
                <span class="sidebar-content">
                    <a href="{{ route('mhs.skripsi') }}">
                        <i class="fas fa-flag-checkered icon-style"></i>
                    </a>
                    <a href="{{ route('mhs.skripsi') }}" class="text-style">Skripsi</a>
                </span>
            </li>
        </ul>
        <!-- UIN -->
        <div class="uin flex flex-col items-start">
            <!-- Gambar dan Teks (Nama Universitas) -->
            <div class="flex items-center gap-3">
                <!-- Gambar -->
                <img style="max-width: 50px;" class=""
                    src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/35574985-86cb-4a95-8103-3e4d240fb5be/dg0hbf8-1f3be10c-c786-4261-adb9-d05a4200cfa0.png/v1/fill/w_1280,h_1393/logo_uin_malang_terbaru_ulul_albab_by_sahlannags_dg0hbf8-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTM5MyIsInBhdGgiOiJcL2ZcLzM1NTc0OTg1LTg2Y2ItNGE5NS04MTAzLTNlNGQyNDBmYjViZVwvZGcwaGJmOC0xZjNiZTEwYy1jNzg2LTQyNjEtYWRiOS1kMDVhNDIwMGNmYTAucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.5iC6ylWFkZqNrml8RCCjDT-HgerS03lWlt7FYqQQz1E"
                    alt="logo uin">
                <!-- Teks -->
                <div class="flex flex-col">
                    <div class="uin-teks">Universitas Islam Negeri Maulana Malik Ibrahim Malang</div>
                </div>
            </div>
            <!-- Copyright di bawah gambar -->
            <div class="uin-copyright text-left">Copyright @ 2025 by UINMA</div>
        </div>
    </nav>
</div>
