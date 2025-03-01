<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Joke::get();
    }
}
