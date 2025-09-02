@extends('warga.templateWarga')

@section('content')
<div class="container py-4">
  <h2 class="mb-4 fw-semibold">Dashboard Warga - Versi Baru</h2>
  <div class="row g-4">

    <div class="col-md-6">
      <div class="card shadow rounded-4 border-0 bg-gradient-primary text-white" style="border-radius: 1rem; box-shadow: 0 8px 25px rgba(0, 123, 255, 0.7);">
        <div class="card-body">
          <h5 class="card-title">Total Iuran Dibayar</h5>
          <p class="display-5 fw-bold">Rp {{ number_format($totalPaid, 0, ',', '.') }}</p>
          <p class="card-text">Terima kasih telah membayar iuran tepat waktu.</p>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow rounded-4 border-0 bg-gradient-danger text-white" style="border-radius: 1rem; box-shadow: 0 8px 25px rgba(220, 53, 69, 0.7);">
        <div class="card-body">
          <h5 class="card-title">Iuran Belum Dibayar</h5>
          <p class="display-5 fw-bold">Rp {{ number_format($totalUnpaid, 0, ',', '.') }}</p>
          <p class="card-text">Segera lunasi iuran Anda untuk mendukung kegiatan RT/RW.</p>
        </div>
      </div>
    </div>

  </div>

  <div class="row g-4 mt-4">
    <div class="col-md-12">
      <div class="card shadow rounded-4 border-0 bg-gradient-warning text-dark" style="border-radius: 1rem; box-shadow: 0 8px 25px rgba(255, 193, 7, 0.7);">
        <div class="card-body">
          <h5 class="card-title">Iuran Bulan Ini</h5>
          <p class="display-4 fw-bold">Rp {{ number_format($unpaidThisMonth, 0, ',', '.') }}</p>
          <p class="card-text">Pastikan iuran bulan ini sudah dibayarkan sebelum tanggal 10.</p>
        </div>
      </div>
    </div>
  </div>

  <h4 class="mt-5 mb-3">Riwayat Pembayaran</h4>
  <div class="table-responsive shadow rounded-4 border-0">
    <table class="table table-striped table-hover rounded-3">
      <thead class="table-primary text-primary">
        <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Kategori</th>
          <th scope="col" class="text-end">Jumlah</th>
          <th scope="col" class="text-center">Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse($payments as $payment)
          <tr>
            <td>{{ $payment->created_at->format('d M Y') }}</td>
            <td>{{ $payment->period }}</td>
            <td class="text-end">Rp {{ number_format($payment->nominal, 0, ',', '.') }}</td>
            <td class="text-center"><span class="badge bg-success">Lunas</span></td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center fst-italic text-muted">Belum ada riwayat pembayaran.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <h4 class="mt-5 mb-3">Pengumuman RT/RW</h4>
  <div class="card shadow rounded-4 border-0 p-3">
    <ul class="list-unstyled mb-0">
      <li><strong>07 Agustus 2025:</strong> Rapat warga di balai RW jam 19.00 WIB.</li>
      <li><strong>05 Agustus 2025:</strong> Iuran bulanan mohon dibayarkan sebelum tanggal 10.</li>
      <li><strong>01 Agustus 2025:</strong> Kegiatan kerja bakti akan dilaksanakan hari Minggu.</li>
    </ul>
  </div>
</div>
@endsection
