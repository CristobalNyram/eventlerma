<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Logbook;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {

        //$role = New Role();

        $log = new Logbook();
        $log->activity_done($description = 'Accedió a la página principal', $table_id = 0, $menu_id = 5, $user_id = Auth::id(), $kind_acction = 1);
        //Logbook::activity_done($description = 'Accedió a la página principal', $table_id = 0, $menu_id = 5, $user_id = Auth::id(), $kind_acction = 1);
        $courses_available= Course::all()->where('status','=','2');
        $packages=Package::all()->where('status','=',2);
        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashboard',
            'courses_available'=>$courses_available,
            'packages_available'=>$packages,


        ];


        return view('dashboard')->with($variables);
    }
    public function home()
    {
        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashsboard',


        ];
        return view('home_page.index')->with($variables);
    }
    public function Sponsor()
    {
        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashboard',


        ];
        return view('home_page.index')->with($variables);
    }
    public function about_us()
    {
        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashboard',


        ];
        return view('home_page.index')->with($variables);
    }
    public function school_services()
    {
        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashboard',


        ];
        return view('home_page.index')->with($variables);
    }
    public function school_galery()
    {
        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashboard',


        ];
        return view('home_page.index')->with($variables);
    }
    public function school_institution()
    {
        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashboard',


        ];
        return view('home_page.index')->with($variables);
    }
}
