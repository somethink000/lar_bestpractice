<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ViewsService;
use Illuminate\Http\Request;

class ViewsController extends Controller
{

    public function __construct(
        protected ViewsService $viewsService,
    ) {}

    public function viewHome() {

        $views = $this->viewsService->view("home");
        
        return $views;

    }
}
