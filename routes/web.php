<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LandingPage;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
// ...


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

Route::get('/', [LandingPageController::class,'index']);
Route::get('/login', [LandingPageController::class,'login']);
// Rute '/dashboard' dengan middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});