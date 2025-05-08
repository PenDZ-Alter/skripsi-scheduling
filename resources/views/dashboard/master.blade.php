<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: Sistem Informasi Akademik Universitas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="storage/css/icon.css" rel="stylesheet">
    <link href="storage/img/UIN-2.1.png" rel='shortcut icon'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="storage/css/header.css">
    <link rel="stylesheet" href="storage/css/sidebar.css">
    <link rel="stylesheet" href="storage/css/HomePage.css">
    <link rel="stylesheet" href="storage/css/profile_page.css">
    <link rel="stylesheet" href="storage/css/headerProfile.css">
    <link rel="stylesheet" href="storage/css/transkrip_page.css">
    <link rel="stylesheet" href="storage/css/skripsi_page.css">
    <link rel="stylesheet" href="storage/css/pembayaran_page.css">
    <link rel="stylesheet" href="storage/css/HasilStudiPage.css">
    <link rel="stylesheet" href="storage/css/studi_Page.css">
</head>


<body style="background-color: #fffcf1" class=" text-gray-800">
    <!-- Wrapper utama dengan padding kiri -->
    <div class="min-h-screen pl-64 md:pl-64 sm:pl-0">
        <!-- SIDEBAR -->
        <aside class="fixed top-0 left-0 w-64 h-full bg-indigo-900 text-white z-50">
            @include('partials.sidebar')
        </aside>

        <!-- HEADER -->
        @include('partials.header')

        <!-- MAIN CONTENT -->
        <main class="p-6">
            @yield('content')
        </main>

        <!-- FOOTER -->
        @include('partials.footer')
    </div>
    <script type="text/javascript" src="storage/js/function.js"></script>
    <script type="text/javascript" src="storage/js/IconDownload.js"></script>
    <script type="text/javascript" src="storage/js/chart.js"></script>
    <script type="text/javascript" src="storage/js/picture-slider.js"></script>
    <script type="text/javascript" src="storage/js/skripsi_page.js"></script>
    @stack('scripts')
</body>

</html>
