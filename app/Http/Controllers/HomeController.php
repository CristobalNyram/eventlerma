<?php

namespace App\Http\Controllers;

use App\Models\Carrer;
use App\Models\Course;
use App\Models\Event;
use App\Models\EventAttended;
use App\Models\Logbook;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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

        $my_events=array();
        $hashUserId=0;
        $hashUserId = Crypt::encryptString(Auth::user()->id);

        $today = Carbon::today();

        if(Auth::user()->role_id==4 || Auth::user()->role_id==5){

            $my_events =EventAttended::where('event_attendeds.status','>=',0)
            ->where('attendee_id', Auth::user()->id)
            ->leftJoin('users', 'event_attendeds.attendee_id', '=', 'users.id')
            ->leftJoin('events', 'event_attendeds.event_id', '=', 'events.id')
            ->select('event_attendeds.id', 'events.name as event_name'
            ,'event_attendeds.payment_status as payment_status'
            ,'event_attendeds.id as event_attendeds_id'
            ,'events.cost as event_cost'
            ,'events.id as event_id'
            #,'events.id as event_id'

            ,'events.slug as event_slug'

            )
            ->get();


        }

        $variables=[
            'menu'=>'dashboard',
            'title_page'=>'dashboard',
            'courses_available'=>$courses_available,
            'packages_available'=>$packages,
            'my_events'=>$my_events,
            'hashUserId'=>$hashUserId,




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
