<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	public function login() {
		if (auth()->user()) {
			return redirect('/chat');
		}
		return view('welcome');
	}

	public function authenticate(Request $request) {
		$credentials = $request->validate([
			'name' => ['required'],
			'password' => ['required'],
		]);

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return response('ok', 200);
		}

		return response('Access deny', 401);
	}

	public function logout(Request $request) {
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
	}
}
