<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return MessageResource::collection(Message::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request) {
		$request->validate([
			'text' => 'min:1|max:255'
		]);
		auth()->user()->messages()->create([
			'text' => $request->string('text')
		]);
	}
}
