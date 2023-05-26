<?php

use App\Http\Controllers\CrudController;
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

Route::get('/', [CrudController::class, 'index'])->name('index');
Route::post('/create', [CrudController::class, 'store'])->name('store');
Route::delete('/{id}', [CrudController::class, 'destroy'])->name('destroy');
Route::get('/edit/{id}', [CrudController::class, 'show'])->name('show');
Route::put('/update/{id}', [CrudController::class, 'update'])->name('update');