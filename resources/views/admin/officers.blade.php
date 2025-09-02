@extends('admin.templateAdmin')
@section('content')
<div class="container py-4">
    <div class="card shadow border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Pengguna</h4>
            <a href="{{ route('officers.tambah') }}" class="btn btn-light btn-sm">
                + Tambah Pengguna
            </a>
        </div>

        <div class="card-body">
            <!-- Form Pencarian -->
            <form action="#" method="GET" class="row g-2 mb-4">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control"
                           placeholder="Cari nama / username..."
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </form>

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama User</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($officers as $user)
                        <tr>
                            <td class="text-center fw-semibold">{{ $user->user->id }}</td>
                            <td>{{ $user->user->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->user->id) }}"
                                   class="btn btn-sm btn-warning me-1">
                                   Edit
                                </a>
                                <form action="{{ route('users.delete', $user->user->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3">
                                Tidak ada data pengguna.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination (jika ada) -->
            @if (method_exists($officers, 'links'))
            <div class="d-flex justify-content-center mt-3">
                {{ $officers->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
