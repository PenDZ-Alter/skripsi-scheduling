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

    @yield('content')

    @include('auth.footer')

    <script type="text/javascript" src="storage/js/toggle-login.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>

</html>
