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
      display: flex;
      min-height: 100vh;
      overflow-x: hidden;
    }

    nav.sidebar {
      width: 250px;
      background: linear-gradient(180deg, #3b3fc1, #2a2e8c);
      min-height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      color: white;
    }

    nav.sidebar .brand-logo {
      width: 50px;
      height: 50px;
      background: #2a2e8c;
      color: #ffffff;
      font-weight: bold;
      font-size: 24px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
    }

    nav.sidebar .brand-logo::before {
      content: "G";
    }

    nav.sidebar .nav-link {
      color: #fff !important;
      font-weight: 500;
      padding: 0.75rem 1.5rem;
      width: 100%;
      text-align: left;
      transition: background-color 0.3s;
    }

    nav.sidebar .nav-link:hover,
    nav.sidebar .nav-link.active {
      background-color: #ffc107;
      color: #2a2e8c !important;
    }

    nav.sidebar .nav-item {
      width: 100%;
    }

    nav.sidebar .dropdown-toggle {
      background: #6c6fcc !important;
      color: #ffffff !important;
      font-weight: bold;
      width: 100%;
      padding: 0.75rem 1.5rem;
      text-align: left;
      border: none;
      margin-top: auto;
      cursor: pointer;
    }

    nav.sidebar .dropdown-menu {
      width: 100%;
      border-radius: 0;
      border: none;
      box-shadow: none;
      background-color: #2a2e8c;
    }

    nav.sidebar .dropdown-menu .dropdown-item {
      color: white;
      padding: 0.75rem 1.5rem;
    }

    nav.sidebar .dropdown-menu .dropdown-item:hover {
      background-color: #ffc107;
      color: #2a2e8c;
    }

    main.content {
      margin-left: 250px;
      padding: 2rem;
      flex-grow: 1;
      background-color: #fff;
      min-height: 100vh;
    }
  </style>
</head>

<body>
  <nav class="sidebar d-flex flex-column">
    <div class="brand-logo"></div>
    <ul class="nav flex-column w-100 px-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">Pengguna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('officers.index') }}">Petugas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dues_members.index') }}">Anggota Iuran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dues_category.index') }}">Kategori Iuran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.payment.index') }}">Pembayaran</a>
      </li>
    </ul>
    <div class="dropdown mt-auto w-100">
      <button class="dropdown-toggle" type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
        G
      </button>
      <ul class="dropdown-menu shadow" aria-labelledby="dropdownProfile">
        <li><a class="dropdown-item" href="#">Profil</a></li>
        <li><a class="dropdown-item text-danger" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
      </ul>
    </div>
  </nav>
  <main class="content">
    @yield('content')
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
