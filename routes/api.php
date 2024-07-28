<?php

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/messages', function (Request $request) {

	auth()->user()->messages()->create([
		'text' => $request->string('text')
	]);

})->middleware('auth:sanctum');
