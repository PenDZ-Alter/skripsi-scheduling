<div class="fixed top-0 left-0 bg-gradient-to-b from-indigo-700 to-indigo-900 w-64 h-screen text-white flex flex-col z-50">
  <!-- Bagian Logo atau Profil Sidebar -->
  <div class="flex items-center p-4 bg-gradient-to-r from-gray-900 to-gray-800">
    <a href="{{ route('home') }}"><i class="fas fa-laptop icon-left"></i></a>
    <span class="title-left">Siakad</span>
    <span class="title-right"><a href="{{ route('home') }}">UINMALANG</a></span>
  </div>

  <!-- Informasi Mahasiswa -->
  <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-gray-900 to-gray-800">
    <!-- Foto Profil -->
    <a href="{{ route('profile') }}" class="profile1"><img src="{{ asset('storage/img/Alfariz.png') }}" alt="Profile" class="profile-picture"></a>
    
    <!-- Nama dan NIM -->
    <div style="margin-left:5px;" class="flex flex-col">
      <span class="name-profile">ALFARIZ MUHAN MANDEGA</span>
      <span class="iconName-profile">
        <!-- Ikon Kartu Identitas -->
        <i class="fas fa-address-card mr-2"></i>
        220605110025
      </span>  
    </div>
  </div>

  <!-- Menu -->
  <nav style="margin-top: 10px;" class="flex-1 overflow-y-auto pb-4">
    <ul>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <!-- Ikon Home -->
          <a href="{{ route('home') }}"><i class="fas fa-house icon-style"></i></a>
          <a href="{{ route('home') }}" class="text-style">Home</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <!-- Ikon Profil Mahasiswa -->
          <a href="{{ route('profile') }}"><i class="fa-regular fa-address-card icon-style"></i></a>
          <a href="{{ route('profile') }}" class="text-style">Profil Mahasiswa</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <!-- Ikon Rekap Pembayaran -->
          <i class="fa-regular fa-credit-card icon-style"></i>
          <a href="#" class="text-style">Rekap Pembayaran</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <!-- Ikon KHS Hasil Studi -->
          <i class="fa-regular fa-newspaper icon-style"></i>
          <a href="#s" class="text-style">KHS Hasil Studi</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <!-- Ikon Statistik Akademisk -->
          <i class="fas fa-chart-line icon-style"></i>
          <a href="#" class="text-style">Statistik Akademik</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <!-- Ikon Transkrip & Riwayat -->
          <i class="fa-regular fa-file icon-style"></i>
          <a href="#" class="text-style">Transkrip & Riwayat</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <!-- Ikon Skripsi/Tesis/Disertasi -->
          <i class="fas fa-flag-checkered icon-style"></i>
          <a href="#" class="text-style">Skripsi/Tesis/Disertasi</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="sidebar-content">
          <i class="fas fa-right-from-bracket icon-style"></i>
          <a href="{{ route('loginpage') }}" class="text-style">Logout</a>
        </span>
      </li>
    </ul>
  </nav>
</div>
