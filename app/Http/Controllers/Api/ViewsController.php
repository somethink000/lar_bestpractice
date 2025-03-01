<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ViewsService;
use Illuminate\Http\Request;

  //TODO сделать через констракт
class ViewsController extends Controller
{

    public function __construct(
        protected ViewsService $viewsService,
    ) {}

  
    public function home(int $id) {
        $key = 'home';
        $views = [];

        $views["count"] = $this->viewsService->view($key);
        
        if ($id) {
            $views["stats"] = $this->viewsService->getStatistics($key); 
        }

        return $views;
    }
    
}
