<?php

use App\Http\Controllers\AntrianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPenggunaController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InputDataLayananController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\SurveyController;

Route::get('/', function () {
    return view('home2');
});
Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard-admin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');
Route::get('/gender-data', [DashboardController::class, 'getGenderData'])->name('gender-data');
Route::get('/detailunitkerja-data', [DashboardController::class, 'getUnitKerjaData'])->name('detailunitkerja-data');
// Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::resource('/pengunjung', \App\Http\Controllers\PengunjungController::class);
Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
Route::get('/survey-pengunjung', [SurveyController::class, 'surveyPengunjung'])->name('survey-pengunjung');
Route::get('/survey/create/{id}', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/search', [PengunjungController::class, 'search'])->name('search');

Route::get('/kategorilayanan', [DetailPenggunaController::class, 'getCustomFields'])->name('kategorilayanan');
Route::get('/get-jenis-layanan/{departemen_id}', [DetailPenggunaController::class, 'getJenisLayanan']);
Route::post('/layanan/tambah', [DetailPenggunaController::class, 'tambah'])->name('layanan.tambah');
Route::post('/layanan/update', [DetailPenggunaController::class, 'update'])->name('layanan.update');
// Route::get('/get-token', [DetailPenggunaController::class, 'getToken'])->name('get-token');
// Route::get('/ticket-custom-fields', [DetailPenggunaController::class, 'getTicketCustomFields'])->name('ticket-custom-fields');
// Route::get('/token-view', function () {
//     return view('token');
// });

Route::get('/input', [InputDataLayananController::class, 'index'])->name('input');
Route::get('/whatsapp/{ID_KANAL}', [InputDataLayananController::class, 'whatsapp'])->name('whatsapp');
Route::get('/telepon/{ID_KANAL}', [InputDataLayananController::class, 'telepon'])->name('telepon');
Route::get('/detail-pengguna', [DetailPenggunaController::class, 'index'])->name('detail-pengguna');
// Route::get('/detail/{id}', [DetailPenggunaController::class, 'getLayananDetail'])->name('detail');
Route::get('/detail', [DetailPenggunaController::class, 'getLayananDetail'])->name('detail');
Route::get('/survey', [SurveyController::class, 'index'])->name('survey');


Route::get('/kemenkeu-id/login', [\App\Http\Controllers\Login::class, 'login'])
    ->name('kemenkeu-id.login');
Route::get('/kemenkeu-id/callback', [\App\Http\Controllers\Login::class, 'callback'])
    ->name('kemenkeu-id.callback');
Route::get('kemenkeu-id/logout', [\App\Http\Controllers\Logout::class, 'logout'])
    ->name('kemenkeu-id.logout');
// Route::get('/', function () {
//     return view('welcome');
// });
