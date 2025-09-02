@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Tambah Anggota Iuran</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.dues_members.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="id_user" class="form-label">Pilih User</label>
              <select class="form-select" id="id_user" name="id_user" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->username }})</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="id_duescategory" class="form-label">Pilih Kategori Iuran</label>
              <select class="form-select" id="id_duescategory" name="id_duescategory" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($duesCategories as $category)
                  <option value="{{ $category->id }}">{{ ucfirst($category->period) }} - Rp {{ number_format($category->nominal, 0, ',', '.') }}</option>
                @endforeach
              </select>
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-2"></i>Simpan
              </button>
              <a href="{{ route('admin.dues_members.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
