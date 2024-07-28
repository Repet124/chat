<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {

	Route::get('/chat{any}', function () {
		return view('chat');
	})->where('any', '.*')->name('chat');

});

