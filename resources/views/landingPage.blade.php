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

      /* Navbar dengan gradient */
      .navbar-custom {
        background: linear-gradient(90deg, #0052a3, #007bff);
      }

      .navbar-custom .fw-bold {
        color: #fff;
        font-size: 1.2rem;
      }

      .navbar-custom .btn {
        border-color: #fff;
        color: #fff;
        transition: 0.3s;
      }

      .navbar-custom .btn:hover {
        background-color: #fff;
        color: #0052a3;
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
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom py-2">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="fw-bold">Portal Warga</div>
        <a href="/login" class="btn btn-sm btn-outline-light">Masuk</a>
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
