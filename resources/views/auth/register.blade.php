<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="storage/img/UIN-2.1.png" rel='shortcut icon'>
    <link href="storage/css/register.css" rel="stylesheet">
    <link href="storage/css/login.css" rel="stylesheet">
    <title>Registrasi | .:: Siakad Informasi Akademik Universitas</title>
</head>

<body>
    <div class="title-registerpage">
        <h2>SISTEM INFORMASI AKADEMIK (SIAKAD)</h2>
    </div>
    <div class="register-box">
        <h2>Form Registrasi</h2>
        <form action="{{ route('register.storeInitial') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required />
            </div>
            <button type="submit" class="register-btn">Daftar</button>
            <p class="signup-link">Sudah punya akun? <a href="{{ route('login') }}">Login Sekarang</a></p>
        </form>
    </div>
    <!-- Footer -->
    <footer>
      <div style="color:rgba(255,255,255,0.8) !important;" class="footer-loginpage">
          <p>Bagian Administrasi Akademik UIN Malang
              Helpdesk :</p>
          <p>&copy; bak@uin-malang.ac.id.</p>
      </div>
  </footer>
</body>

</html>
