<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfessionController;

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


Auth::routes();

Route::get('/', HomeController::class, 'index')->name('home');
Route::middleware('auth')->group(function () {
    // Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::prefix('professions')->group(function () {
        Route::get('create', [ProfessionController::class, 'create'])->name('professions.create');
        Route::post('create', [ProfessionController::class, 'store'])->name('professions.store');

        Route::get('{profession:slug}/edit', [ProfessionController::class, 'edit'])->name('professions.edit
        ');
        Route::put('{profession:slug}/edit', [ProfessionController::class, 'update'])->name('professions.update
        ');

        Route::get('index', [ProfessionController::class, 'index'])->name('professions.index');
        Route::get('dashboard', [ProfessionController::class, 'dashboard'])->name('professions.dashboard');
        Route::get('table', [ProfessionController::class, 'table'])->name('professions.table');
        Route::delete('{profession:slug}/delete', [ProfessionController::class, 'destroy']);
        Route::get('/{slug}', [ProfessionController::class, 'show'])->name('professions.show');
        Route::get('{profession:slug}/detail', [ProfessionController::class, 'detail'])->name('professions.detail');
    });
});
Route::prefix('admin')->group(function () {
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('professions', [AdminController::class, 'professions'])->name('admin.professions');
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');


    //CRUD PROFESSION IN ADMIN
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('create', [AdminController::class, 'store']);

    Route::get('{profession:slug}/edit', [AdminController::class, 'edit'])->name('admin.edit
        ');
    Route::put('{profession:slug}/edit', [AdminController::class, 'update'])->name('admin.put
        ');

    Route::delete('{profession:slug}/delete', [AdminController::class, 'destroy'])->name('admin.profession.destroy');

    Route::get('/{slug}', [AdminController::class, 'show'])->name('admin.show');

    //CRUD NEWS
    Route::get('news/index', [NewsController::class, 'index'])->name('admin.news.index');

    Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('news/create', [NewsController::class, 'store'])->name('admin.news.store');

    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/edit/{id}', [NewsController::class, 'update'])->name('admin.news.put');
});
