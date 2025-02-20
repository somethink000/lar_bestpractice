<?php

use App\Http\Controllers\Api\PostsController;
use App\Http\Middleware\PageView;
use App\Http\Middleware\RouteViewsStats;
use Illuminate\Support\Facades\Route;

Route::get('{any}', fn () => view('app'))->where('any', '^((?!api).)*');

require __DIR__.'/auth.php';

