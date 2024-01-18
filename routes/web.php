<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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


Route::middleware('auth')->group(function () {
    Route::get('/', [StudentController::class, 'index']);

    Route::prefix('student')->group(function () {
        Route::get('/list', [StudentController::class, 'index'])->name('student-index');
        Route::get('/create', [StudentController::class, 'create'])->name('student-create');
        Route::post('/store', [StudentController::class, 'store'])->name('student-store');
        Route::delete('/{student}}', [StudentController::class, 'destory'])->name('student-delete');
        Route::get('/export}', [StudentController::class, 'exportStudent'])->name('student-export');
        Route::post('/import}', [StudentController::class, 'importStudent'])->name('student-import');
    });
});

require __DIR__ . '/auth.php';
