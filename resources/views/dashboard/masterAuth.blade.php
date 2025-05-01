<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('storage/img/UIN-2.1.png') }}" rel='shortcut icon'>
    <link href="{{ asset('storage/css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/login.css') }}" rel="stylesheet">
    <title>@yield('title') | .:: Siakad Informasi Akademik Universitas</title>
</head>

<body>
    <div class="title-registerpage">
        <h2>SISTEM INFORMASI AKADEMIK (SIAKAD)</h2>
    </div>

    @yield('content')

    @include('partials.footerAuth')
</body>

</html>