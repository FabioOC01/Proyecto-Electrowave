<?php

use App\Http\Controllers\ServiceRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('role:admin')->group(function () {
    Route::resource('service_requests', ServiceRequestController::class);
});
Route::middleware('role:user')->group(function () {
    Route::get('service_requests/create', [ServiceRequestController::class, 'create'])->name('service_requests');
    Route::post('service_requests', [ServiceRequestController::class, 'store'])->name('service_requests.store');
});
Route::middleware('auth')->group(function () {
    Route::resource('service_requests', ServiceRequestController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('service_requests', ServiceRequestController::class);

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)
        ->only(['index', 'edit', 'update']); // Solo mostramos el índice, editar y actualizar
    });

// Ruta para la página de computadoras
Route::get('/computadoras', function () {
    return view('computadoras');
})->name('computadoras');

// Ruta para la página de celulares
Route::get('/celulares', function () {
    return view('celulares');
})->name('celulares');

// Ruta para la página de quiénes somos
Route::get('/quienes-somos', function () {
    return view('quienes-somos');
})->name('quienes-somos');