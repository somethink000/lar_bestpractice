<?php

use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('post', PostController::class)
->except([
    'create', 'edit',
]);
