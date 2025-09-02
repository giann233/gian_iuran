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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    nav.sidebar {
      width: 280px;
      background: linear-gradient(180deg, #4a4fc9, #2a2e8c);
      min-height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 1.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      color: white;
      box-shadow: 2px 0 8px rgba(0,0,0,0.15);
      border-radius: 0 15px 15px 0;
      transition: background 0.3s ease;
    }

    nav.sidebar:hover {
      background: linear-gradient(180deg, #5a5fd9, #3a3e9c);
    }

    nav.sidebar .brand-logo {
      width: 60px;
      height: 60px;
      background: #2a2e8c;
      color: #77FF07FF;
      font-weight: 900;
      font-size: 28px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.5rem;
      box-shadow: 0 0 10px #6AFF07FF;
      text-shadow: 0 0 5px #fff;
      letter-spacing: 2px;
      user-select: none;
    }

    nav.sidebar .brand-logo::before {
      content: "W";
    }

    nav.sidebar .nav-link {
      color: #fff !important;
      font-weight: 600;
      padding: 1rem 2rem;
      width: 100%;
      text-align: left;
      transition: background-color 0.3s, color 0.3s;
      font-size: 1.1rem;
      display: flex;
      align-items: center;
      gap: 12px;
      border-radius: 8px;
      margin-bottom: 0.5rem;
    }

    nav.sidebar .nav-link i {
      font-size: 1.3rem;
      color: #77FF07FF;
      transition: color 0.3s;
    }

    nav.sidebar .nav-link:hover,
    nav.sidebar .nav-link.active {
      background-color: #ffc107;
      color: #2a2e8c !important;
    }

    nav.sidebar .nav-link:hover i,
    nav.sidebar .nav-link.active i {
      color: #2a2e8c;
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
      border-radius: 0 0 15px 15px;
      box-shadow: inset 0 0 10px rgba(0,0,0,0.2);
      transition: background-color 0.3s ease;
    }

    nav.sidebar .dropdown-toggle:hover {
      background: #5a5fd9 !important;
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
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    nav.sidebar .dropdown-menu .dropdown-item:hover {
      background-color: #ffc107;
      color: #2a2e8c;
    }

    main.content {
      margin-left: 280px;
      padding: 2rem;
      flex-grow: 1;
      background-color: #fff;
      min-height: 100vh;
      border-radius: 0 15px 15px 0;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body>
  <nav class="sidebar d-flex flex-column">
    <div class="brand-logo"></div>
    <ul class="nav flex-column w-100 px-3">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('warga.dashboard') }}">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>

    </ul>
    <div class="dropdown mt-auto w-100">
      <button class="dropdown-toggle" type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
        W
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
