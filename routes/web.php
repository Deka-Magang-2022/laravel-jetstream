<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::resource('mahasiswa', MahasiswaController::class);

    Route::prefix('/mahasiswa')->name('mahasiswa.')->group(function() {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
        Route::get('/create', [MahasiswaController::class, 'create'])->name('create');
        Route::post('/store', [MahasiswaController::class, 'store'])->name('store');
        Route::get('/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('edit');
        Route::put('/update/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update');
        Route::delete('/destroy/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('destroy');
    });
});
