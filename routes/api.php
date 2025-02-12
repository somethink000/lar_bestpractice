<?php

use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('comment', CommentsController::class)
->except([
   'index', 'create', 'edit', 'show',
]);
Route::resource('post', PostsController::class)
->except([
   'index', 'create', 'edit',
]);


