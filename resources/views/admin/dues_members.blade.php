@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Daftar Anggota Iuran</h2>
    <a href="{{ route('admin.dues_members.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
      <i class="fas fa-plus me-2"></i>Tambah Anggota
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
              <th scope="col" class="text-center">Tanggal Dibuat</th>
            </tr>
          </thead>
          <tbody>
            @forelse($duesMembers as $member)
              <tr class="align-middle">
                <td class="text-center">{{ $member->id }}</td>
                <td>{{ $member->user->name }}</td>
                <td>{{ ucfirst($member->duesCategory->period) }}</td>
                <td>{{ ucfirst($member->duesCategory->period) }}</td>
                <td class="text-end">Rp {{ number_format($member->duesCategory->nominal, 0, ',', '.') }}</td>
                <td class="text-center">{{ $member->created_at->format('d M Y') }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted fst-italic">Belum ada data anggota iuran.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
