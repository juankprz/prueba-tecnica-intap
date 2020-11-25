<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

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
    public function index()
    {
        $activities=Activity::where('user_id', Auth()->user()->id)->get();

        return view('home',compact('activities'));
    }
}
