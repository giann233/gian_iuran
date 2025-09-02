@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Daftar Pembayaran</h2>
    <a href="{{ route('admin.payment.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
      <i class="fas fa-plus me-2"></i>Tambah Pembayaran
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="card shadow rounded-4 border-0">
    <div class="card-body p-4">
      <div class="table-responsive">
        <table class="table table-striped table-hover align-middle rounded-3">
          <thead class="table-primary text-primary">
            <tr>
              <th scope="col" class="text-center">ID</th>
              <th scope="col">Nama User</th>
              <th scope="col">Kategori Iuran</th>
              <th scope="col">Periode</th>
              <th scope="col" class="text-end">Nominal</th>
              <th scope="col">Petugas</th>
              <th scope="col" class="text-center">Tanggal Dibuat</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($payments as $payment)
              <tr class="align-middle">
                <td class="text-center">{{ $payment->id }}</td>
                <td>{{ $payment->user->name }}</td>
                <td>{{ $payment->duesCategory ? ucfirst($payment->duesCategory->period) . ' - Rp ' . number_format($payment->duesCategory->nominal, 0, ',', '.') : 'N/A' }}</td>
                <td>{{ $payment->period }}</td>
                <td class="text-end">Rp {{ number_format($payment->nominal, 0, ',', '.') }}</td>
                <td>{{ $payment->petugas }}</td>
                <td class="text-center">{{ $payment->created_at->format('d M Y') }}</td>
                <td class="text-center">
                  <form action="{{ route('admin.payment.delete', $payment->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-muted fst-italic">Belum ada data pembayaran.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
