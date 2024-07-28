<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
	return redirect()->route('login');
});

Route::get('/login', function () {
	if (auth()->user()) {
		return redirect('/chat');
	}
	return view('welcome');
})->name('login');

Route::post('/login', function (Request $request) {
	$credentials = $request->validate([
		'name' => ['required'],
		'password' => ['required'],
	]);

	if (Auth::attempt($credentials)) {
		$request->session()->regenerate();
		return true;
	}

	return back()->withErrors([
		'login' => 'Deny',
	]);
})->name('login');

Route::get('/logout', function(Request $request) {
	Auth::logout();
	$request->session()->invalidate();
	$request->session()->regenerateToken();
});

Route::middleware('auth:sanctum')->group(function () {

	Route::get('/chat{any}', function () {
		return view('chat');
	})->where('any', '.*')->name('chat');

});

