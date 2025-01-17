<?php

use App\Models\Message;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware([
	'auth:sanctum',
	'role:member'
])->group(function() {

	Route::prefix('users')
		->name('users.')
		->middleware(['role:super-admin'])
		->controller(UserController::class)
		->group(function() {
			Route::get('/', 'index')->name('index');
			Route::put('/{user}/verify', 'verify')->name('verify');
			Route::delete('/{user}', 'destroy')->name('verify');
		});


	Route::apiResource('messages', MessageController::class)
		->only(['index', 'store']);

});
