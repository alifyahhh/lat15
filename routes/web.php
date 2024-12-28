<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', ProfileController::class)->name('profile')->middleware('auth');

Route::resource('employees', EmployeeController::class);

Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('employees', EmployeeController::class);
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    // Routes untuk data master employee
});
Route::get('/', function () {
    return redirect('/login');
});
