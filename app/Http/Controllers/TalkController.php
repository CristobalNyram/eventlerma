<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Logbook;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = New Role();
        $log = new Logbook();

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 30) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done($description = 'Accedió al módulo de Charlas.', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 1);


        $talks_active=Talk::all()->where('status','=','2');
        $talks_active_number=Talk::all()->where('status','=','2')->count();



        $variables=[
            'menu'=>'talks_all',
            'title_page'=>'Conferencias',
            'talks_actives'=>$talks_active,
            'talks_active_number'=> $talks_active_number,



        ];

        return view('talk.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = New Role();
        $log = new Logbook();

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 30) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done($description = 'Accedió al módulo de Charlas.', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 1);



        $rol_available=Role::all()->where('status','=','2');
        $users_speakers=User::all()->where('status', '=', '2')->where('role_id','=','6');
        $variables=[
            'menu'=>'talks_all',
            'title_page'=>'Conferencias',
            'rol_available'=>$rol_available,
            'users_speakers'=>$users_speakers,


        ];

        return view('talk.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $talk =new Talk();
        $talk->name = $request->name;
        $talk->description = $request->description;
        $talk->date = $request->date;
        $talk->time = $request->time;
        $talk->url_img = $request->url_img;
        $talk->speaker_id = $request->speaker_id;

    if($request -> hasFile('url_img')){
        $file = $request ->file('url_img');
        $destiantionPath = 'argon/img/talk/';
        $filename = time() .'-'. $file->getClientOriginalName();
        $uploadSuccess = $request->file('url_img')->move($destiantionPath, $filename);
        $talk->url_img = $destiantionPath . $filename;
    }

    if ($talk->save()) {
        $log=new Logbook();
        $log->activity_done($description='Registró la conferencia'. $talk->title. ' exitosamente.' ,$table_id=0,$menu_id=16,$user_id=Auth::id(),$kind_acction=6);

        return back()->with('success','Se ha registrado la conferencia exitosamente...');

    }
    else
    {
        return  back()->withErrors('No se ha registrado el usuario...');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function show(Talk $talk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $talk = Talk::findOrFail($request->id);
        $talk->name=$request->name;
        $talk->description = $request->description;
        $talk->date = $request->date;
        $talk->time = $request->time;
        $talk->url_img = $request->url_img;
        $talk->speaker_id = $request->speaker_id;

        if($request -> hasFile('url_img')){
            $file = $request ->file('url_img');
            $destiantionPath = 'argon/img/talk/';
            $filename = time() .'-'. $file->getClientOriginalName();
            $uploadSuccess = $request->file('url_img')->move($destiantionPath, $filename);
            $talk->url_img = $destiantionPath . $filename;
        }

        if ($talk->save()) {
            $log=new Logbook();
            $log->activity_done($description='Actualizó la información de una conferencia ' . $talk->name . ' correctamente',$table_id=0,$menu_id=16,$user_id=Auth::id(),$kind_acction=3);

            return back()->with('success','Se ha actualizado la conferencia exitosamente...');

        }
        else
        {
            return  back()->withErrors('No se ha actualizado la conferencia...');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function update($talk_id)
    {
        $role = New Role();
        $log=new Logbook();
        if($role->checkAccesToThisFunctionality(Auth::user()->role_id,10)==null)
        {
            $variables=[
                'menu'=>'',
                'title_page'=>'Acceso denegado',


            ];
            return view('errors.notaccess')->with($variables);

        }

        $log->activity_done($description='Accedió a la vista para Actualizar la información de una conferencia.',$table_id=0,$menu_id=16,$user_id=Auth::id(),$kind_acction=1);



        $current_talk=Talk::findOrFail($talk_id);
        $rol_available=Role::all()->where('status','=','2');
        $users_speakers=User::all()->where('status', '=', '2');

        $variables=[
            'menu'=>'talks_all',
            'title_page'=>'Conferencias',
            'rol_available'=>$rol_available,
            'current_talk'=>$current_talk,
            'users_speakers'=>$users_speakers,



        ];
        return view('talk.update')->with($variables);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function delete($talk_id)
    {
        $talk = Talk::findOrFail($talk_id);
        $talk->status=-2;

        if($talk->save()){
            $log=new Logbook();
            $log->activity_done($description= 'Eliminó el registro de la conferenicia' . $talk->name . 'correctamente',$table_id=0,$menu_id=16,$user_id=Auth::id(),$kind_acction=4);
            return back()->with('success','Se ha eliminado la conferencia exitosamente...')->with('eliminar', 'ok');
        } else {
            return back()->with('success','No se ha eliminado la conferencia exitosamente...');
        }
    }
}
