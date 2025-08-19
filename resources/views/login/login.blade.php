<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Kaswarga</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-container {
      background: white;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 100%;
      max-width: 400px;
      animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 40px 30px;
      text-align: center;
    }

    .login-header h1 {
      font-size: 2.5rem;
      font-weight: 300;
      margin-bottom: 10px;
    }

    .login-header p {
      opacity: 0.9;
      font-size: 1.1rem;
    }

    .login-form {
      padding: 40px 30px;
    }

    .form-group {
      margin-bottom: 25px;
    }

    .form-label {
      font-weight: 600;
      color: #333;
      margin-bottom: 8px;
      display: block;
    }

    .form-control {
      width: 100%;
      padding: 15px;
      border: 2px solid #e1e5e9;
      border-radius: 10px;
      font-size: 16px;
      transition: all 0.3s ease;
      background-color: #f8f9fa;
    }

    .form-control:focus {
      outline: none;
      border-color: #667eea;
      background-color: white;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .btn-login {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .brand-icon {
      width: 60px;
      height: 60px;
      background: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      font-size: 24px;
      font-weight: bold;
      color: #667eea;
    }

    .input-group {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
    }

    .form-control.pl-45 {
      padding-left: 45px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <div class="brand-icon">K</div>
      <h1>Kaswarga</h1>
      <p>Sistem Manajemen Iuran Warga</p>
    </div>

    <div class="login-form">
      <form method="POST" action="/login">
        @csrf

        <div class="form-group">
          <label class="form-label">Username atau Email</label>
          <div class="input-group">
            <i class="fas fa-user input-icon"></i>
            <input type="text" name="username" class="form-control pl-45" placeholder="Masukkan username atau email" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Password</label>
          <div class="input-group">
            <i class="fas fa-lock input-icon"></i>
            <input type="password" name="password" class="form-control pl-45" placeholder="Masukkan password" required>
          </div>
        </div>

        <button type="submit" class="btn-login">
          <i class="fas fa-sign-in-alt me-2"></i>Masuk
        </button>
      </form>

      <div class="login-footer">
        <p>Belum punya akun? <a href="/register">Daftar disini</a></p>
      </div>
    </div>
  </div>
</body>
</html>
