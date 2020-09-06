<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

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
        return view('welcome');
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
    public function changepassword()
    {
        return view('change-password');
    }
    public function draggablemap()
    {
        return view('draggable-map');
    }
    public function environmentmanage()
    {
        return view('environment-manage');
    }
    public function environment()
    {
        return view('environment');
    }
    public function cdcoronamanage()
    {
        return view('cd-corona-manage');
    }
    public function cdcorona()
    {
        return view('cd-corona');
    }
    public function cdcoronalite()
    {
        return view('cd-corona-lite');
    }
    public function report_cdcorona()
    {
        return view('reports/report-cd-corona');
    }
    public function report_environment()
    {
        return view('reports/report-environment');
    }
    public function developmanage()
    {
        return view('develop-manage');
    }
    public function cd_thyroid()
    {
        return view('cd-thyroid');
    }
    public function cdthyroidmanage()
    {
        return view('cd-thyroid-manage');
    }
    public function cd_finil()
    {
        return view('cd-finil');
    }
    public function cdfinilmanage()
    {
        return view('cd-finil-manage');
    }
    public function cd_cancer()
    {
        return view('cd-cancer');
    }
    public function cdcancermanage()
    {
        return view('cd-cancer-manage');
    }
    public function cd_disease()
    {
        return view('cd-disease');
    }
    public function cddiseasemanage()
    {
        return view('cd-disease-manage');
    }
    public function welcome()
    {
        return view('welcome');
    }
}
