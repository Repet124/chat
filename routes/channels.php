<?php

use App\Broadcasting\ChatChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('typing', ChatChannel::class);
Broadcast::channel('message', ChatChannel::class);
