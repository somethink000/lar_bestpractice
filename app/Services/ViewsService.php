<?php

namespace App\Services;

use App\Models\Views;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ViewsService
{

    //можно добавить проверку через бд вместо сессий на наличие просмотра но надо ли вкидывать столько нагрузки для такой простой задачи?
    public function view(string $key)
    {

        $sessionViews = session()->get("views", collect());

        //получаем все просмотры
        $views = Views::firstOrCreate(['key' => $key]);

        $lastViewDate = $sessionViews->pull($key);
        
        //проверяем смотрел ли пользователь ресурс когда нибудь 
        if (!$lastViewDate) {

            $sessionViews->put($key, Carbon::today());

            session(['views' => $sessionViews]);

            $views->increment('count');

            $this->incrementStatistics($key);


        //проверяем смотрел ли пользователь ресурс сегодня для статистики последений в день
        } elseif (new Carbon($lastViewDate < Carbon::today())) {

            $this->incrementStatistics($key);
        }


        return $views->count;
    }

    public function getStatistics(string $key) {

    }



    private function incrementStatistics(string $key)
    {

        //повторяющийся запрос
        $viewQuery = DB::table('views_daily')->where(['key' => $key])->whereDate('created_at', Carbon::today());
        // заполняем дневную статистику
        if (!$viewQuery->exists()) {

            DB::table('views_daily')->insert([
                'key' => $key,
                'views' => 1,
                'created_at' => Carbon::today(),
            ]);
        } else {

            $viewQuery->increment('views', 1);
        }
    }
}
