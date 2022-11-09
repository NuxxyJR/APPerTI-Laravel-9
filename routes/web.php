<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\infoController;
use App\Http\Controllers\dosenController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\konselingController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\detailKonselingController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FITUR AUTHENTICATION LOGIN ADMIN
Route::get('/admin/home', function () {
    return view('/admin/home');
})->name('adminHome')->middleware('auth');

Route::get('/admin', [LoginAdminController::class, 'login'])->middleware(['guest', 'must-mahasiswa']);

Route::post('/admin', [LoginAdminController::class, 'login_admin'])->name('login_admin')->middleware('guest');

Route::get('/logoutAdmin', [LoginAdminController::class, 'logoutAdmin'])->name('logoutAdmin')->middleware('auth');

Route::get('/admin/admin-user', [LoginAdminController::class, 'adminUser'])->name('indexAdmin');
Route::post('/admin/admin-user', [LoginAdminController::class, 'add_admin'])->name('add_admin');
Route::delete('/admin/admin-user/delete/{id}', [LoginAdminController::class, 'destroy'])->name('deleteAdmin');

// FITUR AUTHENTICATION LOGIN MAHASISWA DAN DOSEN
Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('must-mahasiswa');
Route::post('/', [LoginController::class, 'loginUser'])->name('loginUser')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logoutMahasiswa'])->name('logoutMahasiswa')->middleware('auth:mahasiswa');



// ROUTE ADMIN UNTUK MAHASISWA
Route::get('/admin/admin-mahasiswa', [mahasiswaController::class, 'index'])->name('indexMhs')->middleware('auth');
Route::get('/admin/admin-detail-mahasiswa/{nim}', [mahasiswaController::class, 'show'])->name('show')->middleware('auth');
Route::post('/admin/admin-mahasiswa', [mahasiswaController::class, 'store'])->name('store')->middleware('auth');
Route::delete('/admin/admin-mahasiswa/delete/{nim}', [mahasiswaController::class, 'destroy'])->name('deleteMhs')->middleware('auth');
Route::post('/admin/admin-mahasiswa/getProdi', [mahasiswaController::class, 'getProdi'])->name('getProdi')->middleware('auth');
Route::put('admin-detail-mahasiswa/{nim}', [mahasiswaController::class, 'update'])->name('updateMhs')->middleware('auth');

// ROUTE ADMIN UNTUK DOSEN
Route::get('/admin/admin-dosen', [dosenController::class, 'index'])->name('indexDos')->middleware('auth');
Route::post('/admin/admin-dosen', [dosenController::class, 'store'])->name('storeDos')->middleware('auth');
Route::get('/admin/admin-edit-dosen/{nip}', [dosenController::class, 'edit'])->name('editDos')->middleware('auth');
Route::put('/admin/admin-edit-dosen/update/{nip}', [dosenController::class, 'update'])->name('updateDos')->middleware('auth');
Route::delete('/admin/admin-dosen/delete/{nip}', [dosenController::class, 'destroy'])->name('deleteDos')->middleware('auth');
// ROUTE ADMIN JURUSAN
Route::get('/admin/admin-jurusan', [jurusanController::class, 'index'])->name('indexJur')->middleware('auth');
Route::get('/admin/admin-jurusan/{id_jur}', [jurusanController::class, 'getDosen'])->name('getDosen')->middleware('auth');
Route::post('/admin/admin-jurusan', [jurusanController::class, 'store'])->name('storeJurusan')->middleware('auth');
Route::get('/admin/admin-jurusan/admin-edit-jurusan/{id_jur}', [jurusanController::class, 'edit'])->name('editJurusan')->middleware('auth');
Route::delete('/admin/admin-jurusan/delete/{id_jur}', [jurusanController::class, 'destroy'])->middleware('auth');
Route::put('/admin/admin-jurusan/admin-edit-jurusan/{id_jur}', [jurusanController::class, 'update'])->name('updateJurusan')->middleware('auth');

// ROUTE ADMIN UNTUK PRODI
Route::get('/admin/admin-prodi', [prodiController::class, 'index'])->name('indexProdi')->middleware('auth');
Route::get('/admin/admin-edit-prodi/{id_prodi}', [prodiController::class, 'edit'])->name('editProdi')->middleware('auth');
Route::post('/admin/admin-prodi/store', [prodiController::class, 'store'])->name('storeProdi')->middleware('auth');
Route::put('/admin/admin-edit-prodi/update/{id_prodi}', [prodiController::class, 'update'])->name('updateProdi')->middleware('auth');
Route::delete('/admin/admin-prodi/delete/{id_prodi}', [prodiController::class, 'destroy'])->name('deleteProdi')->middleware('auth');

// ROUTE ADMIN UNTUK KELAS
Route::get('/admin/admin-kelas', [kelasController::class, 'index'])->name('indexKelas')->middleware('auth');
Route::post('/admin/admin-kelas', [kelasController::class, 'store'])->name('storeKelas')->middleware('auth');
Route::get('/admin/admin-edit-kelas/{id_kelas}', [kelasController::class, 'edit'])->name('editKelas')->middleware('auth');
Route::put('/admin/admin-edit-kelas/{id_kelas}', [kelasController::class, 'update'])->name('updateKelas')->middleware('auth');
Route::delete('/admin/admin-kelas/{id_kelas}', [kelasController::class, 'delete'])->name('deleteKelas')->middleware('auth');

// ROUTE ADMIN UNTUK KONSELING
Route::get('/admin/admin-konseling', function () {
    return view('admin/admin-konseling');
});

// Route ADMIN Data Konseling
Route::get('/admin/data-konseling', [konselingController::class, 'index'])->name('indexDataKonseling')->middleware('auth');


// Route ADMIN Detail Konseling
Route::get('/admin/detail_konseling', [detailKonselingController::class, 'index'])->name('indexDetailKonseling')->middleware('auth');
Route::get('/admin/detail-bimbingan/{id}', [detailKonselingController::class, 'show'])->name('detailKonseling')->middleware('auth');

// Pengumuman ADMIN Konseling Route
Route::get('/admin/pengumuman-konseling', [infoController::class, 'indexNews'])->name('indexNews')->middleware('auth');
Route::put('/admin/pengumuman-konseling/{id}', [infoController::class, 'updateNews'])->name('updateNews')->middleware('auth');


// -----------------------------------------------------------------------------------------------------------//

// ROUTE FITUR MAHASISWA

Route::get('/mahasiswa', [infoController::class, 'indexNewsMhs'])->name('indexMahasiswa')->middleware(['auth:mahasiswa']);

Route::get('/mahasiswa/konseling/{nim}', [mahasiswaController::class, 'showKonseling'])->name('MhsKonseling');
Route::post('/mahasiswa/konseling', [konselingController::class, 'konselingMahasiswa'])->name('konselingMahasiswa');

Route::get('/mahasiswa/detail-konseling/{nim}', [detailKonselingController::class, 'showDetailKonselMhs'])->name('mahasiswaDetailKonseling');
Route::get('/mahasiswa/detail-konseling/details/{id}', [detailKonselingController::class, 'showDetails'])->name('mahasiswaChatKonseling');

Route::post('/mahasiswa/mahasiswa-chat-konseling', [detailKonselingController::class, 'createChat'])->name('createChat');


// ROUTE FITUR DOSEN
Route::get('/dosen', [infoController::class, 'indexNewsDos'])->name('indexDosen')->middleware(['auth:dosen']);
Route::get('/dosen/logout', [LoginController::class, 'logoutDosen'])->name('logoutDosen')->middleware('auth:dosen');
Route::get('/dosen/konseling/details/{id}', [detailKonselingController::class, 'showDetailsKonselDos'])->name('dosenChatKonseling');
// Route::get('/dosen/konseling/details/{id}', function () {
//     return view('dosen.dosen-chat-konseling');
// })->name('detailsDosenKonseling');
Route::get('/dosen/konseling/{nip}', [detailKonselingController::class, 'konselDos'])->name('konselDos');
Route::post('/dosen/dosen-chat-konseling', [detailKonselingController::class, 'createChatDos'])->name('createChatDos');
