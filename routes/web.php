<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['admin'])->group(function () {
    // Route::get('/admin/all/specialities', [SpecialityController::class, 'index'])->name('admin.specialities.all');
    // Route::get('/admin/add/specialities', [SpecialityController::class, 'create'])->name('admin.specialities.create');
    // Route::post('/admin/add/specialities', [SpecialityController::class, 'store'])->name('admin.specialities.store');
    // Route::get('/admin/edit/specialities/{speciality}', [SpecialityController::class, 'edit'])->name('admin.specialities.edit');
    // Route::put('/admin/edit/specialities/{speciality}', [SpecialityController::class, 'update'])->name('admin.specialities.update');
    // Route::delete('/admin/delete/specialities/{speciality}', [SpecialityController::class, 'destroy'])->name('admin.specialities.destroy');

    // Route::redirect('/admin/spcialities', '/admin/all/specialities')->name('admin.spcialities');

    
Route::controller(SpecialityController::class)->group(function() {

    Route::get('/admin/all/specialities', 'AllSpecialities')->name('admin.specialities.all');
    Route::get('/admin/add/specialities', 'AddSpecialities')->name('admin.specialities.create');
    Route::post('/admin/store/specialities', 'StoreSpecialities')->name('admin.specialities.store');
    Route::get('/admin/edit/specialities/{speciality}', 'EditSpecialities')->name('admin.specialities.edit');
    Route::post('/admin/update/specialities', 'UpdateSpecialities')->name('admin.specialities.update');
    Route::get('/admin/delete/specialities/{speciality}', 'DeleteSpecialities')->name('admin.specialities.delete');

});

});
// / End Admin Group Middleware

// Shared logout (works for both roles via the auth guard)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
