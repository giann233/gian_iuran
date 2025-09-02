<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal Warga</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Segoe UI", Arial, sans-serif;
        background-color: #f4f7fb;
      }

      /* Navbar dengan gradient dan sticky */
      .navbar-custom {
        background: linear-gradient(90deg, #0052a3, #007bff);
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
      }

      .navbar-custom.scrolled {
        background: rgba(0, 82, 163, 0.95);
        backdrop-filter: blur(10px);
      }

      .navbar-custom .navbar-brand {
        color: #fff;
        font-size: 1.5rem;
        font-weight: bold;
        display: flex;
        align-items: center;
      }

      .navbar-custom .navbar-brand i {
        margin-right: 10px;
        font-size: 1.8rem;
      }

      .navbar-custom .navbar-nav .nav-link {
        color: #fff;
        font-weight: 500;
        margin: 0 10px;
        transition: all 0.3s ease;
        position: relative;
      }

      .navbar-custom .navbar-nav .nav-link:hover {
        color: #e6f0ff;
        transform: translateY(-2px);
      }

      .navbar-custom .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 50%;
        background-color: #fff;
        transition: all 0.3s ease;
        transform: translateX(-50%);
      }

      .navbar-custom .navbar-nav .nav-link:hover::after {
        width: 100%;
      }

      .navbar-custom .btn {
        border-color: #fff;
        color: #fff;
        transition: all 0.3s ease;
        border-radius: 25px;
        padding: 8px 20px;
      }

      .navbar-custom .btn:hover {
        background-color: #fff;
        color: #0052a3;
        transform: scale(1.05);
      }

      /* Hamburger menu */
      .navbar-toggler {
        border: none;
        background: none;
      }

      .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
      }

      @media (max-width: 991px) {
        .navbar-custom .navbar-nav {
          background: rgba(0, 82, 163, 0.95);
          backdrop-filter: blur(10px);
          margin-top: 10px;
          border-radius: 10px;
          padding: 10px;
        }

        .navbar-custom .navbar-nav .nav-link {
          margin: 5px 0;
          text-align: center;
        }
      }

      /* Header */
      header {
        background: linear-gradient(to right, #e6f0ff, #ffffff);
      }

      header h2 {
        font-weight: 700;
      }

      /* Section box */
      .section-box {
        border: none;
        border-radius: 12px;
        background-color: #fff;
        padding: 25px;
        height: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s, box-shadow 0.3s;
      }

      .section-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
        background-color: #f9fcff;
      }

      .section-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #0052a3;
        margin-bottom: 0.5rem;
      }

      .section-box i {
        font-size: 2rem;
        color: #007bff;
        margin-bottom: 10px;
      }

      /* Info section */
      .info-section {
        background: #f0f6ff;
        border-top: 2px solid #cfd9e3;
      }

      .info-section h5 {
        color: #004080;
      }

      /* Footer */
      footer {
        font-size: 0.9rem;
        color: #fff;
        background: #0052a3;
      }
    </style>
    <script
      src="https://kit.fontawesome.com/yourkitid.js"
      crossorigin=""
    ></script>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom navbar-expand-lg py-3">
      <div class="container">
        <a class="navbar-brand" href="#">
          <i class="fas fa-home"></i>
          iuran warga
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features">Fitur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Kontak</a>
            </li>
          </ul>
          <div class="d-flex">
            <a href="/login" class="btn btn-outline-light">Masuk</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="py-5 border-bottom text-center">
      <div class="container">
        <h2 class="fw-bold text-primary">Satu Aplikasi untuk Semua Warga</h2>
        <p class="text-muted">
          Sederhana, efisien, dan mudah dipakai oleh semua kalangan.
        </p>
      </div>
    </header>

    <!-- Fitur Utama -->
    <section class="py-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-4">
            <div class="section-box text-center">
              <i class="fas fa-users"></i>
              <div class="section-title">Data Warga</div>
              <p class="text-muted">
                Pencatatan keluarga dan anggota rumah secara aman.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="section-box text-center">
              <i class="fas fa-coins"></i>
              <div class="section-title">Iuran & Keuangan</div>
              <p class="text-muted">
                Kelola pemasukan dan pengeluaran RT/RW secara transparan.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="section-box text-center">
              <i class="fas fa-calendar-alt"></i>
              <div class="section-title">Agenda & Info</div>
              <p class="text-muted">
                Lihat pengumuman penting dan kegiatan rutin warga.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Info tambahan -->
    <section class="py-5 info-section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-6">
            <h5 class="fw-bold">Tampilan Mudah Dipahami</h5>
            <p class="text-muted">
              Tidak perlu belajar teknologi — cukup buka dan gunakan.
            </p>
          </div>
          <div class="col-md-6">
            <h5 class="fw-bold">Akses Khusus Pengurus</h5>
            <p class="text-muted">
              Data bisa diatur oleh RT, RW, dan bendahara sesuai peran.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-3 mt-4">
      <div class="container text-center">
        &copy; 2025 Portal Warga. Hak cipta dilindungi undang-undang.
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
