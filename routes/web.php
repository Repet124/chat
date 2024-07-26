<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/chat{any}', function () {
	return view('chat');
})->where('any', '.*');
