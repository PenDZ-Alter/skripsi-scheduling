<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: Sistem Informasi Akademik Universitas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="storage/img/UIN-2.1.png" rel='shortcut icon'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="storage/css/mahasiswa/header.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/sidebar.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/HomePage.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/profile_page.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/headerProfile.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/transkrip_page.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/skripsi_page.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/pembayaran_page.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/HasilStudiPage.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/studiPage.css">
    <link rel="stylesheet" href="storage/css/mahasiswa/statistikPage.css">
</head>


<body class="text-gray-800">
    <!-- Wrapper utama dengan padding kiri -->
    <div class="min-h-screen pl-64 md:pl-64 sm:pl-0 web-wrapper">
        <!-- SIDEBAR -->
        <aside class="fixed top-0 left-0 w-64 h-full">
            @include('dashboard.mahasiswa.partials.sidebar')
        </aside>

        <!-- HEADER -->
        @include('dashboard.mahasiswa.partials.header')

        <!-- MAIN CONTENT -->
        <main style="background-color: rgba(255, 252, 245, 1) !important;" class="p-6">
            @yield('content')
        </main>

        <!-- FOOTER -->
        @include('dashboard.mahasiswa.partials.footer')
    </div>
    <script type="text/javascript" src="storage/js/function.js"></script>
    <script type="text/javascript" src="storage/js/IconDownload.js"></script>
    <script type="text/javascript" src="storage/js/chart.js"></script>
    <script type="text/javascript" src="storage/js/picture-slider.js"></script>
    <script type="text/javascript" src="storage/js/skripsi_page.js"></script>
    <script type="text/javascript" src="storage/js/transkrip_page.js"></script>
    <script type="text/javascript" src="storage/js/studi_page.js"></script>
    <script type="text/javascript" src="storage/js/statistik_page.js"></script>
    @stack('scripts')
</body>

</html>
