@extends('admin.templateAdmin')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-success">📋 Data Pengguna</h2>
        <a href="{{ route('user.tambah') }}" class="btn btn-success shadow-sm">
            <i class="fas fa-user-plus me-2"></i>Tambah Pengguna
        </a>
    </div>

    <!-- Form Pencarian -->
    <form action="#" method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control shadow-sm"
                   placeholder="🔍 Cari nama / username" value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary shadow-sm">
                <i class="fas fa-search me-1"></i>Cari
            </button>
        </div>
    </form>

    <!-- Tabel -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-success text-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Level</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td class="fw-semibold text-secondary">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td><span class="badge bg-light text-dark px-2">{{ $user->username }}</span></td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        @if($user->role == 'admin')
                            <span class="badge bg-danger">Admin</span>
                        @elseif($user->role == 'officer')
                            <span class="badge bg-primary">Petugas</span>
                        @else
                            <span class="badge bg-secondary">Warga</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', $user->id) }}"
                           class="btn btn-sm btn-warning shadow-sm me-1">
                           <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('users.delete', $user->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            <button class="btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-3">
                        <i class="fas fa-info-circle me-2"></i> Tidak ada data pengguna.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
