<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use PHPUnit\Framework\Attributes\Group;

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

Route::get('/', function () {
    return view('home');
});


// Route::group(['middleware' => 'guest'], function()  {  

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

// });

Route::group(['middleware' => 'auth'], function()  {  

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/category', [DashboardController::class, 'create'])->name('category');
    Route::post('/admin/category', [DashboardController::class, 'upload'])->name('upload');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});