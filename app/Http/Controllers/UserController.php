<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function index(Request $request) {
		return $request->boolean('unverified')
			? User::withoutRole('member')->get()
			: User::all();
	}

	public function verify(User $user, Request $request) {
		dd($user);
	}
}
