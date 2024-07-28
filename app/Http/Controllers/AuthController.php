<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	public function join() {
		return auth()->user() ? redirect('/chat') : view('regester');
	}

	public function regester(Request $request) {
		$credentials = $request->validate([
			'username' => 'required|max:15|min:1|alpha:ascii|unique:users,username',
			'name' => 'required|max:100|min:1|unique:users,name',
			'password' => 'required|max:20|min:6',
		]);

		User::create($credentials);
		return response('ok', 200);
	}

	public function login() {
		return auth()->user() ? redirect('/chat') : view('login');
	}

	public function authenticate(Request $request) {
		$credentials = $request->validate([
			'username' => 'required',
			'password' => 'required',
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
		return response('ok', 200);
	}
}
