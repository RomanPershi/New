<?php

use App\Http\Controllers\Todo\CreateController;
use App\Http\Controllers\Todo\DeleteController;
use App\Http\Controllers\Todo\SelectController;
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



Auth::routes();

Route::get('/', SelectController::class)->name('todos.select');
Route::middleware('auth')->group(function () {
    Route::post('/newtask', CreateController::class)->name('todos.create');
    Route::delete('/todos/{todo}', DeleteController::class)->name('todos.destroy');
});
