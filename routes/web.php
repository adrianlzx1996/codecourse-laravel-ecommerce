<?php

	use App\Http\Controllers\CartIndexController;
	use App\Http\Controllers\HomeController;
	use App\Http\Controllers\ProductShowController;
	use Illuminate\Support\Facades\Route;

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

	Route::get('/', HomeController::class);
	Route::get('/cart', CartIndexController::class);

	Route::get('/products/{product:slug}', ProductShowController::class);

	Route::get('/dashboard', function () {
		return view('dashboard');
	})->middleware([ 'auth' ])->name('dashboard');

	require __DIR__ . '/auth.php';
