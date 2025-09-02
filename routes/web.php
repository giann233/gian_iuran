<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('warga.dashboard');
    return view('landingPage');
});

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/warga/dashboard', [WargaController::class, 'dashboard'])->name('warga.dashboard')->middleware('auth');
Route::get('/warga/dashboard-new', function () {
    return view('warga.dashboard_new');
})->name('warga.dashboard.new')->middleware('auth');
Route::get('/admin/dashboard', [AdminController::class, 'dashboardAdmin'])->name('admin.dashboard')->middleware('auth');
Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/user', [AdminController::class, 'userView'])->name('users.index')->middleware('auth');
Route::get('/user/edit/{id}', [AdminController::class, 'userEditView'])->name('users.edit')->middleware('auth');
Route::post('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('users.edit')->middleware('auth');
Route::get('/user/add/user', [AdminController::class,'userTambahView'])->name('user.tambah')->middleware('auth');
Route::post('/user/add/user', [AdminController::class,'userTambah'])->name('user.tambah.post')->middleware('auth');
Route::post('/user/delete/{id}', [AdminController::class, 'userDelete'])->name('users.delete')->middleware('auth');

Route::get('/officers', [AdminController::class, 'officersView'])->name('officers.index')->middleware('auth');
Route::get('/officers/add', [AdminController::class, 'officerTambahView'])->name('officers.tambah')->middleware('auth');
Route::post('/officers/add', [AdminController::class, 'officerTambah'])->name('officers.tambah.post')->middleware('auth');

// Dues Category routes
Route::get('/admin/dues_category', [AdminController::class, 'duesCategoryIndex'])->name('admin.dues_category.index')->middleware('auth');
Route::get('/admin/dues_category/create', [AdminController::class, 'duesCategoryCreate'])->name('admin.dues_category.create')->middleware('auth');
Route::post('/admin/dues_category', [AdminController::class, 'duesCategoryStore'])->name('admin.dues_category.store')->middleware('auth');
Route::get('/admin/dues_category/{id}/edit', [AdminController::class, 'duesCategoryEdit'])->name('admin.dues_category.edit')->middleware('auth');
Route::put('/admin/dues_category/{id}', [AdminController::class, 'duesCategoryUpdate'])->name('admin.dues_category.update')->middleware('auth');
Route::delete('/admin/dues_category/{id}', [AdminController::class, 'duesCategoryDestroy'])->name('admin.dues_category.destroy')->middleware('auth');

// Payment delete route
Route::delete('/admin/payment/{id}', [AdminController::class, 'paymentDelete'])->name('admin.payment.delete')->middleware('auth');

// Payment routes
Route::get('/admin/payment', [AdminController::class, 'paymentIndex'])->name('admin.payment.index')->middleware('auth');
Route::get('/admin/payment/create', [AdminController::class, 'paymentCreate'])->name('admin.payment.create')->middleware('auth');
Route::post('/admin/payment', [AdminController::class, 'paymentStore'])->name('admin.payment.store')->middleware('auth');

// Dues Members routes
Route::get('/admin/dues-members', [AdminController::class, 'duesMembersIndex'])->name('admin.dues_members.index')->middleware('auth');
Route::get('/admin/dues-members/create', [AdminController::class, 'duesMembersCreate'])->name('admin.dues_members.create')->middleware('auth');
Route::post('/admin/dues-members', [AdminController::class, 'duesMembersStore'])->name('admin.dues_members.store')->middleware('auth');
