<?php

use Illuminate\Support\Facades\Route;
use Modules\Chat\Http\Controllers\ChatController;

Route::middleware([])->group(function () {
    Route::resource('chats', ChatController::class)->names('chat');
});
