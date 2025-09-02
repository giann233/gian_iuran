<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <title>Kas Warga</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    nav {
      background: linear-gradient(90deg, #3b3fc1, #2a2e8c);
    }

    nav .nav-link {
      color: #fff !important;
      font-weight: 500;
      transition: 0.3s;
    }

    nav .nav-link:hover {
      color: #ffc107 !important;
    }

    .brand-logo {
      width: 38px;
      height: 38px;
      background: #2a2e8c;
      color: #ffffff;
      font-weight: bold;
      font-size: 18px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .brand-logo::before {
      content: "G";
    }

    .dropdown-toggle {
      background: #6c6fcc !important;
      color: #ffffff !important;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <nav class="border-bottom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-2">
      <!-- Brand -->
      <div class="d-flex align-items-center gap-2">
        <div class="brand-logo"></div>
        <span class="fw-bold text-white fs-5">KasWarga</span>
      </div>

        <!-- Profile Dropdown -->
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center justify-content-center rounded-circle text-decoration-none dropdown-toggle"
            id="dropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="width: 38px; height: 38px;">
            G
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><a class="dropdown-item text-danger" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @yield('content')
</body>

</html>
