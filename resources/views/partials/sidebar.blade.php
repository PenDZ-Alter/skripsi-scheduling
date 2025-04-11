<div class="fixed top-0 left-0 bg-gradient-to-b from-indigo-700 to-indigo-900 w-64 h-screen text-white flex flex-col z-50">
  <!-- Bagian Logo atau Profil Sidebar -->
  <div class="flex items-center p-4 bg-gradient-to-r from-gray-900 to-gray-800">
    <img src="{{ asset('storage/img/PCFix.png') }}" alt="Logo" class="w-10 h-10 mr-2">
    <span style="font-weight:700;" class="text-white text-lg">Siakad</span>
    <span style="letter-spacing: -2px;" class="text-blue-300 font-semibold text-lg ml-1"><a href="{{ route('home') }}">UINMALANG</a></span>
  </div>

  <!-- Informasi Mahasiswa -->
  <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-gray-900 to-gray-800">
    <!-- Foto Profil -->
    <img src="{{ asset('storage/img/Alfariz.png') }}" alt="Profile" style="height:75px; width:50px;" class="w-20 h-20 rounded-md">
    
    <!-- Nama dan NIM -->
    <div style= "margin-left:5px;" class="flex flex-col">
      <span style="font-weight:700; letter-spacing:0px; margin-top:-15px; font-size: 0.9rem;" class="text-blue-300 font-bold text-md">ALFARIZ MUHAN MANDEGA</span>
      <span style="margin-top:5px; font-size: 0.8rem;" class="text-white font-semibold text-sm flex items-center">
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
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Home -->
          <i class="fas fa-house mr-2"></i>
          <a href="{{ route('home') }}" class="block">Home</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Profil Mahasiswa -->
          <i class="fa-regular fa-address-card mr-2"></i>
          <a href="{{ route('profile') }}" class="block">Profil Mahasiswa</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Rekap Pembayaran -->
          <i class="fa-regular fa-credit-card mr-2"></i>
          <a href="#" class="block">Rekap Pembayaran</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon KHS Hasil Studi -->
          <i class="fa-regular fa-newspaper mr-2"></i>
          <a href="#" class="block">KHS Hasil Studi</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Statistik Akademisk -->
          <i class="fas fa-chart-line mr-2"></i>
          <a href="#" class="block">Statistik Akademik</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Transkrip & Riwayat -->
          <i class="fa-regular fa-file mr-2"></i>
          <a href="#" class="block">Transkrip & Riwayat</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Jadwal Perkuliahan -->
          <i class="fa-regular fa-calendar mr-2"></i>
          <a href="#" class="block">Jadwal Perkuliahan</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Pemrograman KRS -->
          <i class="fa-regular fa-calendar-plus mr-2"></i>
          <a href="#" class="block">Pemrograman KRS</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Pengajuan Ijazah -->
          <i class="fa-regular fa-file-zipper mr-2"></i>
          <a href="#" class="block">Pengajuan Ijazah / SKPI</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Skripsi/Tesis/Disertasi -->
          <i class="fas fa-flag-checkered mr-2"></i>
          <a href="#" class="block">Skripsi/Tesis/Disertasi</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Daftar Wisuda -->
          <i class="fas fa-graduation-cap mr-2"></i>
          <a href="#" class="block">Daftar Wisuda / No. Ijazah</a>
        </span>
      </li>
      <li class="px-4 py-2 hover:bg-indigo-800">
        <span class="text-blue-300 font-semibold text-sm flex items-center">
          <!-- Ikon Daftar Wisuda -->
          <i class="fas fa-right-from-bracket mr-2"></i>
          <a href="#" class="block">Logout</a>
        </span>
      </li>
    </ul>
  </nav>
</div>
