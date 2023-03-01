<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductMovementController;
use App\Models\ProductMovement;

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

/* Route::get('/', function () {
    return view('index')->middleware('auth');
}); */

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');

Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->middleware('auth');

Route::get('/products/{id}', [ProductController::class, 'show'])->middleware('auth');

Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');

Route::put('/products/update/{id}', [ProductController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth');

Route::post('/products/add/{id}',[ProductController::class, 'addProduct'])->middleware('auth');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return redirect('/');
})->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');
});
