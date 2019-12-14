<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }
    public function users()
    {
        return view('users');
    }
    public function test()
    {
        return view('test');
    }
    public function region()
    {
        return view('region');
    }
    public function coldchain()
    {
        return view('coldchain');
    }
}
