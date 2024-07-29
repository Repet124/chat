<?php

namespace App\Models;

use App\Http\Resources\MessageResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
	use HasFactory, BroadcastsEvents;

	protected $fillable = [
		'text',
	];

	public function user(): BelongsTo {
		return $this->belongsTo(User::class);
	}

	public function broadcastOn(string $event): array {
		return [new Channel('message')];
	}

	public function broadcastWith(string $event): array {
		return (new MessageResource($this))->resolve();
	}

}
