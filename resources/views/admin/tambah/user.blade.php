@extends('admin.templateAdmin')
@section('content')
<title>Tambah Pengguna Baru</title>
<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }
    .form-container {
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transition: box-shadow 0.3s ease;
    }
    .form-container:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
    }
    .form-title {
        text-align: center;
        font-weight: 700;
        font-size: 2rem;
        color: #5a2a83;
        margin-bottom: 30px;
        letter-spacing: 1px;
    }
    .required-field::after {
        content: " *";
        color: #e74c3c;
    }
    label {
        font-weight: 600;
        color: #555;
    }
    input.form-control, select.form-select, textarea.form-control {
        border-radius: 8px;
        border: 1.5px solid #ccc;
        padding: 10px 12px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }
    input.form-control:focus, select.form-select:focus, textarea.form-control:focus {
        border-color: #764ba2;
        box-shadow: 0 0 8px rgba(118, 75, 162, 0.4);
        outline: none;
    }
    .input-group-text {
        background: #764ba2;
        color: #fff;
        border: none;
        border-radius: 8px 0 0 8px;
    }
    .btn-primary {
        background: #764ba2;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 8px;
        transition: background 0.3s ease;
    }
    .btn-primary:hover {
        background: #5a2a83;
    }
    .btn-outline-secondary {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 1.1rem;
    }
    .profile-preview {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #764ba2;
        display: block;
        margin: 0 auto 20px;
        transition: transform 0.3s ease;
    }
    .profile-preview:hover {
        transform: scale(1.05);
    }
    .form-section {
        margin-bottom: 25px;
    }
    .form-section h5 {
        color: #764ba2;
        border-bottom: 3px solid #764ba2;
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-weight: 700;
        font-size: 1.2rem;
    }
    .form-check-label {
        font-weight: 600;
        color: #555;
    }
    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
    }
    .action-buttons .btn {
        min-width: 130px;
        font-weight: 700;
    }
</style>

<div class="container py-5">
    <form id="addUserForm" action="{{ route('user.tambah.post') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-container">
            <h2 class="form-title"><i class="fas fa-user-plus me-2"></i>Tambah Pengguna Baru</h2>

            <div class="form-section">
                <h5>Informasi Dasar</h5>
                <div class="mb-3">
                    <label for="namaLengkap" class="form-label required-field">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label required-field">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="tel" class="form-control" id="telepon" name="phone" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5>Keamanan</h5>
                <div class="mb-3">
                    <label for="password" class="form-label required-field">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label required-field">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5>Upload Foto Profil</h5>
                <div class="mb-3 text-center">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a47e61af-a99d-409b-ada4-7bde3507f0fd.png" alt="Preview foto profil" id="profilePreview" class="profile-preview">
                    <div>
                        <input type="file" id="profilePhoto" class="d-none" accept="image/*" name="photo">
                        <button type="button" class="btn btn-outline-primary btn-sm" id="uploadBtn">
                            <i class="fas fa-upload me-1"></i>Upload Foto
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5>Jabatan & Alamat</h5>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select" id="jabatan" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="warga">Warga</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="address" rows="3" required></textarea>
                </div>
            </div>

            <div class="form-section">
                <h5>Status</h5>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="statusAktif" name="status" value="1" checked>
                    <label class="form-check-label" for="statusAktif">User Aktif</label>
                </div>
            </div>

            <div class="action-buttons">
                <button type="reset" class="btn btn-outline-secondary">
                    <i class="fas fa-undo me-1"></i>Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Simpan User
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });

    document.getElementById('uploadBtn').addEventListener('click', function () {
        document.getElementById('profilePhoto').click();
    });

    document.getElementById('profilePhoto').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('profilePreview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Validasi password JS
    document.getElementById('addUserForm').addEventListener('submit', function (e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Password dan konfirmasi password tidak cocok!');
        }
    });
</script>
@endsection
