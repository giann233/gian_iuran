@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
          <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Kategori Iuran</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.dues_category.update', $duesCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="period" class="form-label">Periode</label>
              <select class="form-select" id="period" name="period" required>
                <option value="mingguan" {{ $duesCategory->period == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ $duesCategory->period == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ $duesCategory->period == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="nominal" class="form-label">Nominal</label>
              <input type="number" class="form-control" id="nominal" name="nominal" value="{{ $duesCategory->nominal }}" required>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <input type="text" class="form-control" id="status" name="status" value="{{ $duesCategory->status }}" required>
            </div>
            <button type="submit" class="btn btn-warning">
              <i class="fas fa-save me-2"></i>Perbarui
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
