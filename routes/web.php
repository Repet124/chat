<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckVerification;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/join', [AuthController::class, 'join'])->name('register');
Route::post('/regester', [AuthController::class, 'regester']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {

	Route::get('/verification', [AuthController::class, 'showVerify'])->name('verification');

	Route::get('/chat{any?}', function () {
		return view('chat');
	})
		->where('any', '.*')
		->middleware(CheckVerification::class)
		->name('chat');

});
