<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use App\Models\Carrer;
use App\Models\Talk;
use App\Models\Sponsor;
use App\Models\Souvenir;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Event;
use App\Models\EventAttended;
use App\Models\Package;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeWebController extends Controller
{

    public function index()
    {

        $sponsors=Sponsor::all()->where('status','=','2');
        $today = Carbon::today();
        $events = Event::where('status', 2)
            ->whereDate('date', '>=', $today)
            ->get();

        $variables=[
            'sponsors'=>$sponsors,
            'events'=>$events,

        ];
        return view('home_page.index')->with($variables);
    }
    public function calendar()
    {
        $sponsors1=Sponsor::all()->where('status','=','2');

        $variables=[
            'sponsors1'=>$sponsors1,
        ];
        return view('home_page.calendar')->with($variables);
    }
    public function events()
    {
        $sponsors=Sponsor::all()->where('status','=','2');
        $today = Carbon::today();
        $events = Event::where('status', 2)
            ->whereDate('date', '>=', $today)
            ->get();
        $variables=[
            'sponsors'=>$sponsors,
            'events'=>$events,

        ];
        return view('home_page.events')->with($variables);
    }
    public function event_detail($slug)
    {
        // 0  no esta en el evento
        // 1 esta pero no a pagado
        // 2 esta y ya pago
        $user_in_event=0;
        $hashUserId=0;




        $sponsors=Sponsor::all()->where('status','=','2');
        $today = Carbon::today();
        $event = Event::where('status', 2)
            ->where('slug', '=', $slug)
            ->first();
        if (!$event) {
                return redirect()->route('home')->with('error', 'El evento no existe o no está disponible.');
        }

        if (Auth::check()) {
            // $hashUserId=Hash::make(Auth::id());
            $hashUserId = Crypt::encryptString(Auth::id());


            $user_in_event_enrrol = EventAttended::where('event_id', $event->id)
                                                  ->where('attendee_id', Auth::id())
                                                  ->first();

            if ($user_in_event_enrrol) {
                // Si el usuario está registrado en el evento
                $user_in_event = 1;

                if ($user_in_event_enrrol->payment_status == 2) {
                    $user_in_event = 2;
                }
            }
        }

        $variables=[
            'sponsors'=>$sponsors,
            'user_in_event'=>$user_in_event,
            'event'=>$event,
            'hashUserId'=>$hashUserId,


        ];

        // dd($event);
        return view('home_page.event_detail')->with($variables);
    }



    public function sponsor()
    {
        $sponsors1=Sponsor::all()->where('status','=','2');

        $variables=[
            'sponsors1'=>$sponsors1,
        ];
        return view('home_page.sponsor')->with($variables);
    }

    public function course()
    {
        $courses1=Course::all()->where('status','=','2');


        $variables=[
            'courses1'=>$courses1,
        ];
        return view('home_page.course')->with($variables);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function CourseInterface($course_id){

        $current_course=Course::findOrFail($course_id);

        $nombre = $current_course->speaker_id;

        $consulta = Course::join('users', 'courses.speaker_id', '=', 'users.id')->select('courses.speaker_id', 'users.name')->where('users.id', '=', $nombre)->get();

        $variables=[
            'current_course'=>$current_course,
            'consulta'=>$consulta
        ];

        return view('home_page.course_interface')->with($variables);
    }

    public function conference()
    {
        $conference=Talk::all()->where('status','=','2');

        $variables=[
            'conference'=>$conference,
        ];

        return view('home_page.conference')->with($variables);
    }

    public function ConferenceInterface($talk_id)
    {



    $current_conference=Talk::findOrFail($talk_id);

    $variables=[
        'current_conference'=>$current_conference,
    ];

        return view('home_page.conference_interface')->with($variables);

    }

    public function timeline()
    {

        return view('home_page.timeline');
    }

    public function timeline2()
    {

        return view('home_page.timeline2');
    }


    public function really()
    {


        return view('home_page.Really_games');


    }

    public function souvenir()
    {
        $souvenir1=Souvenir::all()->where('status','=','2')->where('id','=','1');
        $souvenir2=Souvenir::all()->where('status','=','2')->where('id','=','2');
        $souvenir3=Souvenir::all()->where('status','=','2')->where('id','=','3');
        $precio1= Package::all()->where('status','=','2')->where('id','=','1');
        $precio2= Package::all()->where('status','=','2')->where('id','=','2');
        $precio3= Package::all()->where('status','=','2')->where('id','=','3');
        $variables=[
            'souvenir1'=>$souvenir1,
            'souvenir2'=>$souvenir2,
            'souvenir3'=>$souvenir3,
            'precio1'=>$precio1,
            'precio2'=>$precio2,
            'precio3'=>$precio3,
        ];
        return view('home_page.souvenir')->with($variables);
    }

    public function login()
    {

        return view('home_page.login');
    }

    public function create()
    {
        $carrers_available=Carrer::all()->where('status','=','2');

        $variables=[

            'carrers_available'=>$carrers_available,
        ];

        return view('home_page.formulario_registro')->with($variables);
    }

    public function SpeakerInterface($user_id)
    {

        $current_user = User::findOrFail($user_id);
        $current_user1 = User::findOrFail($user_id+1);
        $current_user2 = User::findOrFail($user_id+2);
        $current_user3 = User::findOrFail($user_id+3);

        $variables = [
            'current_user' => $current_user,
            'current_user1' => $current_user1,
            'current_user2' => $current_user2,
            'current_user3' => $current_user3,
        ];

        return view('home_page.speaker')->with($variables);
    }

    public function createStudent(RegisterRequest $request) {

        $user =new User();
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->gender = $request->gender;
        $user->role_id =$request->role_id;
        $user->career = $request->career;
        $user->quarter = $request->quarter;
        $user->group = $request->group;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->user_image = $request->user_image;
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $destiantionPath = 'argon/img/user/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('user_image')->move($destiantionPath, $filename);
            $user->user_image = $destiantionPath . $filename;
        }

        if ($user->save()) {

            return redirect()->route('home_page_login');
        }
        else
        {
            return  back()->withErrors('No se ha registrado el usuario...');

        }

    }
}
