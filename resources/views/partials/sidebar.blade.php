<div class="fixed top-0 left-0 w-64 h-screen text-white flex flex-col z-50">
    <!-- Bagian Logo atau Profil Sidebar -->
    <div class="flex items-center p-4 bg-gradient-to-r">
        <a href="{{ route('home') }}"><i class="fas fa-laptop icon-left"></i></a>
        <span class="title-left">Skripsi</span>
        <span class="title-right"><a href="{{ route('home') }}">UINMALANG</a></span>
    </div>

    <!-- Informasi Mahasiswa -->
    <span class="profil flex items-center justify-between">
        <div class="flex flex-col">
            <div class="name-profile">ALFARIZ MUHAN M</div>
            <div class="iconName-profile">220605110001</div>
        </div>
        <!-- Ikon di sebelah kanan -->
        <a href="{{ route('login') }}">
            <i class="fas fa-right-from-bracket icon-style2"></i></a>
    </span>

    <!-- Menu -->
    <nav class="flex-1 overflow-y-auto">
        <ul>
            <li class="px-4 py-1">
                <span class="sidebar-content">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-house icon-style"></i>
                    </a>
                    <a href="{{ route('home') }}" class="text-style">Home</a>
                </span>
            </li>
            <li class="px-4 py-1">
                <span class="sidebar-content">
                    <a href="{{ route('profile') }}">
                        <i class="fa-regular fa-address-card icon-style"></i>
                    </a>
                    <a href="{{ route('profile') }}" class="text-style">Profil Mahasiswa</a>
                </span>
            </li>
            <li class="px-4 py-1">
                <span class="sidebar-content">
                    <a href="{{ route('pembayaran') }}">
                        <i class="fa-regular fa-credit-card icon-style"></i>
                    </a>
                    <a href="{{ route('pembayaran') }}" class="text-style">Pembayaran</a>
                </span>
            </li>
            <li class="px-4 py-1">
                <span class="sidebar-content">
                    <a href="{{ route('studi') }}">
                        <i class="fa-regular fa-newspaper icon-style"></i>
                    </a>
                    <a href="{{ route('studi') }}" class="text-style">Hasil Studi</a>
                </span>
            </li>
            <li class="px-4 py-1">
                <span class="sidebar-content">
                    <a href="{{ route('statistik') }}">
                        <i class="fas fa-chart-line icon-style"></i>
                    </a>
                    <a href="{{ route('statistik') }}" class="text-style">Statistik</a>
                </span>
            </li>
            <li class="px-4 py-1">
                <span class="sidebar-content">
                    <i class="fa-regular fa-file icon-style"></i>
                    <a href="#" class="text-style">Transkrip</a>
                </span>
            </li>
            <li class="px-4 py-2">
                <span class="sidebar-content">
                    <a href="{{ route('skripsi') }}">
                        <i class="fas fa-flag-checkered icon-style"></i>
                    </a>
                    <a href="{{ route('skripsi') }}" class="text-style">Skripsi</a>
                </span>
            </li>
        </ul>
        <!-- UIN -->
        <div class="uin flex items-center justify-between">
            <span class="flex flex-col">
                <div class="uin-teks">Universitas Islam Negeri Maulana Malik Ibrahim Malang</div>
                <div class="uin-copyright">Copyright @ 2025 by UINMA</div>
            </span>
        </div>
    </nav>
</div>