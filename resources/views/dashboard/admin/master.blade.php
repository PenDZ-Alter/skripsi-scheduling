<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: Sistem Informasi Akademik Universitas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="../storage/css/admin/icon.css" rel="stylesheet">
    <link href="../storage/img/UIN-2.1.png" rel='shortcut icon'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../storage/css/admin/header-admin.css">
    <link rel="stylesheet" href="../storage/css/admin/sidebar-admin.css">
    <link rel="stylesheet" href="../storage/css/admin/jadwal-admin.css">
    <link rel="stylesheet" href="../storage/css/admin/profile-admin.css">
    <link rel="stylesheet" href="../storage/css/admin/home-admin.css">
    <link rel="stylesheet" href="../storage/css/admin/footer-admin.css">
</head>


<body style="background-color: #fffcf1" class=" text-gray-800">
    <!-- Wrapper utama dengan padding kiri -->
    <div class="min-h-screen pl-64 md:pl-64 sm:pl-0">
        <!-- SIDEBAR -->
        <aside class="fixed top-0 left-0 w-64 h-full bg-indigo-900 text-white z-50">
            @include('dashboard.admin.partials.sidebar')
        </aside>

        <!-- HEADER -->
        @include('dashboard.admin.partials.header')

        <!-- MAIN CONTENT -->
        <main class="p-6">
            @yield('content')
        </main>

        <!-- FOOTER -->
        @include('dashboard.admin.partials.footer')
    </div>
    <script type="text/javascript" src="../storage/js/function.js"></script>
    {{-- <script type="text/javascript" src="../storage/js/IconDownload.js"></script> --}}
    <script type="text/javascript" src="../storage/js/chart.js"></script>
    <script type="text/javascript" src="../storage/js/picture-slider.js"></script>
    <script type="text/javascript" src="../storage/js/skripsi_page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
