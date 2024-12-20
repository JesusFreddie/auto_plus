<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Middleware\Admin;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('cars/store', [CarController::class, 'store'])->name('cars.store');

    Route::get('requests/create', [RequestController::class, 'create'])->name('requests.create');
    Route::post('requests/store', [RequestController::class, 'store'])->name('requests.store');
});

Route::middleware((Admin::class))->group(function(){
    Route::get('/admin', [AdminController::class, 'index']) -> name('admin.index');
    Route::put('/requests/update/', [RequestController::class, 'update'])->name('requests.update');
    // Route::put('/update', [ReportController::class, 'update'])->name('reports.update');
});

require __DIR__.'/auth.php';
