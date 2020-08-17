<?php

namespace App\Http\Controllers;

use App\Entity\Task;
use App\User;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( )
    {
        $tasks = Task::all();


        return view('home', compact('tasks'));
    }
}
