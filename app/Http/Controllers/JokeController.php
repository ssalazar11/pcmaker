<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class JokeController extends Controller{
    public function randomJoke(){
        $response=Http::get('https://official-joke-api.appspot.com/random_joke');
        if($response->successful()){
            $joke=$response->json();
            return view('api.joke', ['joke' => $joke]);
        }else{
            return response()->json(['error' => 'Joke not obtainable'], 500);
        }
    }
}