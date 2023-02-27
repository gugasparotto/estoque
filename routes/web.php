<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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
    return view('index');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/delete/{id}', [ProductController::class, 'delete']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products/edit/{id}', [ProductController::class, 'edit']);

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
