<?php

namespace App\Services;

use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ViewsService
{

    public function view(string $key)
    {     
        
        $sessionViews = session()->get("views", collect());

        //можно добавить проверку через бд на наличие просмотра но надо ли вкидывать столько нагрузки для такой простой задачи?
        //if (!$sessionViews->contains($key)) {
            

            // $sessionViews->push($key);

            // session(['views' => $sessionViews]);

            $views = Views::firstOrCreate(['key' => $key]);
            
            $views->increment('count');

            return $views->count;
        //}
    }

    
}
