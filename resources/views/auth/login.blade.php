<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | .:: Siakad Informasi Akademik Malang</title>
    <link href="storage/img/UIN-2.1.png" rel='shortcut icon'>
    <link href="storage/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="title-loginpage">
        <h2>SISTEM INFORMASI AKADEMIK (SIAKAD)</h2>
    </div>
    <section class="login-section">
        <div class="login-container">
            <h2>Masuk ke Akun Anda</h2>
            <form action="{{ route('home') }}" method="GET">
                <div class="input-group">
                    <label for="username">Email</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <p class="signup-link">Belum punya akun? <a href="{{ route('registerpage') }}">Daftar Sekarang</a></p>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-loginpage">
            <p>Bagian Administrasi Akademik UIN Malang
                Helpdesk :</p>
            <p>&copy; bak@uin-malang.ac.id.</p>
        </div>
    </footer>

</body>

</html>
