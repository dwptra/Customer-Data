<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Controller;

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

Route::get('/dashboard', [Controller::class, 'dashboard']);

Route::prefix('/pelanggan')->group(function() {
    Route::get('/', [PelangganController::class, 'index']);
    Route::delete('/deletecustomerprocess/{id}', [PelangganController::class, 'destroy'])->name('deleteCustomerProcess');

    Route::get('/formaddcustomer', [PelangganController::class, 'add']);
    Route::post('/formaddcustomer/process', [PelangganController::class, 'addProcess'])->name('addCustomerProcess');

    Route::get('/formeditcustomer/{id}', [PelangganController::class, 'edit'])->name('editCutomerForm');
    Route::patch('/formeditcustomer/{id}', [PelangganController::class, 'editProcess'])->name('editCustomerProcess');  
});

Route::get('/', [UserController::class, 'login']);
Route::post('/login/process', [UserController::class, 'loginProcess'])->name('loginProcess');

Route::get('/register', [UserController::class, 'register']);
Route::post('/register/process', [UserController::class, 'registerProcess'])->name('registerProcess');

Route::get('/logout', [UserController::class, 'logout']);