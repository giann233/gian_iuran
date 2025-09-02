@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow rounded-4 border-0">
        <div class="card-header bg-primary text-white rounded-top">
          <h5 class="mb-0"><i class="fas fa-list me-2"></i>Manajemen Kategori Iuran</h5>
        </div>
        <div class="card-body p-4">
          <a href="{{ route('admin.dues_category.create') }}" class="btn btn-primary mb-3 rounded-pill px-4 shadow-sm">
            <i class="fas fa-plus me-2"></i>Tambah Kategori Iuran
          </a>
          <table class="table table-striped table-hover rounded-3">
            <thead class="table-primary text-primary">
              <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col">Periode</th>
                <th scope="col" class="text-end">Nominal</th>
                <th scope="col">Status</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($duesCategories as $category)
              <tr>
                <td class="text-center">{{ $category->id }}</td>
                <td>{{ ucfirst($category->period) }}</td>
                <td class="text-end">Rp {{ number_format($category->nominal, 0, ',', '.') }}</td>
                <td>{{ $category->status }}</td>
                <td class="text-center">
                  <a href="{{ route('admin.dues_category.edit', $category->id) }}" class="btn btn-warning btn-sm rounded-pill px-3">Edit</a>
                  <form action="{{ route('admin.dues_category.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm rounded-pill px-3" type="submit">Hapus</button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center fst-italic text-muted">Belum ada kategori iuran.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
