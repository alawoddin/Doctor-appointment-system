<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});
 
// Patient dashboard — only accessible by patients
Route::get('/dashboard', function () {
    return view('patient.index');
})->middleware(['auth', 'patient'])->name('dashboard');

// Doctor dashboard — only accessible by doctors
Route::get('/doctor/dashboard', [DoctorController::class, 'DoctorDashboard'])
    ->middleware(['auth', 'doctor'])
    ->name('doctor.dashboard');

// Admin routes
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'AdminLoginPost'])
    ->name('admin.login.post');

Route::post('/admin/logout', [AdminController::class, 'AdminLogout'])
    ->name('admin.logout');

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])
    ->middleware('admin')
    ->name('admin.dashboard');

Route::middleware(['admin'])->controller(AdminController::class)->group(function () {
Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');
Route::get('/admin/spcialities', 'AdminSpcialities')->name('admin.spcialities');

    });
    /// End Admin Group Middleware 

// Shared logout (works for both roles via the auth guard)
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';