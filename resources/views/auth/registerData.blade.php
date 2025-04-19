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
        <h2>Form Registrasi Data Lanjutan</h2>
        <form action="{{ route('handleRegister') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin Anda</label>
                <input type="text" id="jenis_kelamin" name="jenis_kelamin" required />
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor HP Anda</label>
                <input type="number" id="no_telp" name="no_telp" required />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Anda</label>
                <input type="text" id="alamat" name="alamat" required />
            </div>
            <div class="form-group">
                <label for="nama_ortu">Nama Orang Tua</label>
                <input type="text" id="nama_ortu" name="nama_ortu" required />
            </div>
            <div class="form-group">
                <label for="domisili_ortu">Domisili Orang Tua</label>
                <input type="text" id="domisili_ortu" name="domisili_ortu" required />
            </div>
            <button type="submit" class="register-btn">Daftar</button>
            <p class="signup-link">Apakah anda ingin membatalkan? <a href="{{ route('loginpage') }}">Kembali</a></p>
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
