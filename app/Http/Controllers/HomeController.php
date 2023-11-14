<?php

namespace App\Http\Controllers;
use App\Services\JokeService;

class HomeController extends Controller
{
    protected $jokeService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JokeService $jokeService)
    {
        $this->middleware('auth');
        $this->jokeService=$jokeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $joke=$this->jokeService->getRandomJoke();
        return view('home', ['joke'=>$joke]);
    }
}
