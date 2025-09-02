@extends('admin.templateAdmin')

@section('content')
<div class="container py-4">
  <h1 class="mb-4">Dashboard Admin</h1>
  <div class="row g-4">
    <div class="col-md-3">
      <div class="card text-white bg-primary shadow rounded-4 border-0" style="border-radius: 1rem; box-shadow: 0 8px 20px rgba(0, 123, 255, 0.6);">
        <div class="card-body">
          <h5 class="card-title">Total Pengguna</h5>
          <p class="card-text fs-3">{{ \App\Models\User::count() }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-success shadow rounded-4 border-0" style="border-radius: 1rem; box-shadow: 0 8px 20px rgba(40, 167, 69, 0.6);">
        <div class="card-body">
          <h5 class="card-title">Total Petugas</h5>
          <p class="card-text fs-3">{{ \App\Models\officer::count() }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-warning shadow rounded-4 border-0" style="border-radius: 1rem; box-shadow: 0 8px 20px rgba(255, 193, 7, 0.6);">
        <div class="card-body">
          <h5 class="card-title">Total Anggota Iuran</h5>
          <p class="card-text fs-3">{{ \App\Models\dues_members::count() }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-info shadow rounded-4 border-0" style="border-radius: 1rem; box-shadow: 0 8px 20px rgba(23, 162, 184, 0.6);">
        <div class="card-body">
          <h5 class="card-title">Total Pembayaran</h5>
          <p class="card-text fs-3">{{ \App\Models\payment::count() }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
