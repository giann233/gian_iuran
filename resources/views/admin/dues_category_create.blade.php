@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Tambah Kategori Iuran</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.dues_category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="period" class="form-label">Periode</label>
              <select class="form-select" id="period" name="period" required>
                <option value="">-- Pilih Periode --</option>
                <option value="mingguan">Mingguan</option>
                <option value="bulanan">Bulanan</option>
                <option value="tahunan">Tahunan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="nominal" class="form-label">Nominal</label>
              <input type="number" class="form-control" id="nominal" name="nominal" required>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save me-2"></i>Simpan
            </button>
            <a href="{{ route('admin.dues_category.index') }}" class="btn btn-secondary">
              <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
