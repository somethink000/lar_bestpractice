<?php

use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ViewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('post', PostController::class)
->except([
    'create', 'edit',
]);


Route::group([ 'prefix'=>'view'], function(){
    Route::get('/home',[ViewsController::class, 'viewHome']);
});