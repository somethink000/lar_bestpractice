<?php

namespace App\Http\Services;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
//use App\Http\Requests\TaskStoreRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;

class PageViewsService
{

    public function view(string $page)
    {
        // $views = session()->get("views", collect());

        // if (!$views->contains($page)) {
        //     //можно добавить проверку через бд на наличие просмотра но надо ли?

        //     $views->push($page);

        //     session(['views' => $views]);
        // }
    }
}
