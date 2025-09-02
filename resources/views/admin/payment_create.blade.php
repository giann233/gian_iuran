@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Tambah Pembayaran</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.payment.store') }}" method="POST">
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
                  <option value="{{ $category->id }}">{{ $category->period }} - Rp {{ number_format($category->nominal, 0, ',', '.') }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="period" class="form-label">Tanggal Pembayaran</label>
              <input type="date" class="form-control" id="period" name="period" required>
            </div>

            <div class="mb-3">
              <label for="nominal" class="form-label">Nominal</label>
              <input type="number" class="form-control" id="nominal" name="nominal" placeholder="e.g., 25000" required>
            </div>

            <div class="mb-3">
              <label for="petugas" class="form-label">Petugas</label>
              <input type="text" class="form-control" id="petugas" name="petugas" placeholder="Nama petugas" required>
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-2"></i>Simpan
              </button>
              <a href="{{ route('admin.payment.index') }}" class="btn btn-secondary">
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

@section('scripts')
<script>
document.getElementById('id_duescategory').addEventListener('change', function() {
    const categoryId = this.value;
    const periodInput = document.getElementById('period');

    if (categoryId) {
        // Get the selected option text to determine if it's mingguan or bulanan
        const selectedOption = this.options[this.selectedIndex];
        const categoryText = selectedOption.text;

        // Get current date
        const now = new Date();
        const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                           'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const currentMonth = monthNames[now.getMonth()];
        const currentYear = now.getFullYear();

        // Set period based on category type
        if (categoryText.includes('mingguan')) {
            periodInput.value = `Minggu ${now.getWeek()} ${currentMonth} ${currentYear}`;
        } else if (categoryText.includes('bulanan')) {
            periodInput.value = `${currentMonth} ${currentYear}`;
        } else {
            periodInput.value = `${currentMonth} ${currentYear}`;
        }
    } else {
        periodInput.value = '';
    }
});

// Helper function to get week number
Date.prototype.getWeek = function() {
    const d = new Date(Date.UTC(this.getFullYear(), this.getMonth(), this.getDate()));
    const dayNum = d.getUTCDay() || 7;
    d.setUTCDate(d.getUTCDate() + 4 - dayNum);
    const yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
    return Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
};
</script>
@endsection
