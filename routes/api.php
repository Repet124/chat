<?php

use App\Models\Message;
use App\Http\Controllers\MessageController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {

	Route::apiResource('messages', MessageController::class)
		->only(['index', 'store']);

});
