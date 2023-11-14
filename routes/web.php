<?php

use App\Http\Controllers\DownloadFilesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [SolicitudController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/proyecto/register', [SolicitudController::class, 'create'])->middleware(['auth'])->name('proyecto.create');
Route::get('/proyecto/{project}/edit', [SolicitudController::class, 'edit'])->middleware(['auth'])->name('proyecto.edit');
Route::get('/proyecto/download-pdf/{project}', [SolicitudController::class, 'generatePDF'])->middleware(['auth'])->name('pdf');

Route::get('/download-convocatoria', [DownloadFilesController::class, 'downloadConvocatoria'])->name('downloadConvocatoria');
Route::get('/download-anexo-uno', [DownloadFilesController::class, 'downloadAnexoUno'])->name('downloadAnexoUno');
Route::get('/download-anexo-dos', [DownloadFilesController::class, 'downloadAnexoDos'])->name('downloadAnexoDos');
Route::get('/download-anexo-tres', [DownloadFilesController::class, 'downloadAnexoTres'])->name('downloadAnexoTres');
Route::get('/download-lineamientos', [DownloadFilesController::class, 'downloadLineamientos'])->name('downloadLineamientos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
