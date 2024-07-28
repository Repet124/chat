<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return Message::all();
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request) {
		auth()->user()->messages()->create([
			'text' => $request->string('text')
		]);
	}
}
