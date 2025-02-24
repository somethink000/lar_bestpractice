<?php

namespace App\Console\Commands;

use App\Models\Joke;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportJokes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-jokes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $model = Joke::class;

        $response = Http::get('https://official-joke-api.appspot.com/random_joke');


        if ($response->failed()) {
            dump($response->status(), $response->json());
        }

        $model::create($response->json());
           

    }
}
