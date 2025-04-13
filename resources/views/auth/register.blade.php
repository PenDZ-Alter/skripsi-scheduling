<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Registrasi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 350px;
    }
    .register-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .register-btn {
      width: 100%;
      padding: 10px;
      background: #4CAF50;
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
    }
    .register-btn:hover {
      background: #45a049;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2>Form Registrasi</h2>
    <form action="{{ route('login') }}" method="GET">
      <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit" class="register-btn">Daftar</button>
    </form>
  </div>
</body>
</html>
