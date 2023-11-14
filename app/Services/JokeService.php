<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JokeService
{
    public function getRandomJoke()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');
        return $response->successful() ? $response->json() : null;
    }
}
