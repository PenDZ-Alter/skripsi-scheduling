<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>.:: Sistem Informasi Akademik Universitas</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="storage/css/icon.css" rel="stylesheet">
  <link href="storage/img/UIN-2.1.png" rel='shortcut icon'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  {{-- <link href="storage/css/modal.css" rel="stylesheet"> --}}
</head>

<body style="background-color: #e4e4e7" class=" text-gray-800">
  <!-- Kontainer utama, min-h-screen agar tinggi minimal = tinggi layar -->
  <div class="min-h-screen flex pl-64">
    <!-- SIDEBAR -->
    <aside class="fixed top-0 left-0 bg-indigo-900 text-white w-64 h-screen overflow-y-auto z-50">
      <!-- Letakkan logo, menu, dll. di sini -->
      @include('partials.sidebar')
    </aside>

    <!-- BAGIAN KANAN: HEADER + MAIN + FOOTER -->
    <!-- flex-1 agar kolom kanan memenuhi sisa ruang -->
    <div class="flex-1 flex flex-col sm:ml-64 md:ml-64 lg:ml-32 xl:ml-16 2xl:ml-16">
      <!-- HEADER -->
      @include('partials.header')

      <!-- MAIN: flex-1 agar mendorong footer ke bawah jika konten tinggi -->
      <main class="sm:ml-32 md:ml-32 lg:ml-32 xl:ml-16 2xl:ml-16 flex-1 p-6">
        @yield('content')
      </main>

      <!-- FOOTER: tetap di bawah konten, masih dalam flex container -->
      @include('partials.footer')
    </div>
  </div>
  <script type="text/javascript" src="storage/js/function.js"></script>
</body>

</html>