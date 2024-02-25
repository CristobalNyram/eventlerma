<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Logbook;
use App\Models\Carrer;
use Illuminate\Support\Carbon;

class StudentController extends Controller
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

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 28) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done($description = 'Accedió al módulo de Estudiantes.', $table_id = 0, $menu_id = 28, $user_id = Auth::id(), $kind_acction = 1);


        $users_active=User::all()->where('status','=','2')->where('role_id','=','4');
        $users_active_number=User::all()->where('status','=','2')->where('role_id','=','4')->count();




        $variables=[
            'menu'=>'alumnos_all',
            'title_page'=>'Estudiantes',
            'users_actives'=>$users_active,
            'users_active_number'=> $users_active_number,




        ];
        return view('student.index')->with($variables);
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

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id,12) == null) {

            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',

            ];

            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done($description = 'Accedió al módulo de Estudiantes.',$table_id = 0, $menu_id = 12, $user_id = Auth::id(), $kind_acction = 1);

        $rol_available=Role::all()->where('status','=','2');
        $carrers_available=Carrer::all()->where('status','=','2');
        $current_user=User::all()->where('status','=','2')->where('role_id','=','4');

        $variables=[
            'menu'=>'alumnos_all',
            'title_page'=>'Estudiantes',
            'rol_available'=>$rol_available,
            'carrers_available'=>$carrers_available,
            'current_user'=>$current_user


        ];

        return view('student.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =new User();
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->gender = $request->gender;
        $user->role_id =$request->role_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password) ;
        $user->user_image = $request->user_image;
        $user->career = $request->career;
        $user->quarter = $request->quarter;
        $user->group = $request->group;
        


        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $destiantionPath = 'argon/img/user/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('user_image')->move($destiantionPath, $filename);
            $user->user_image = $destiantionPath . $filename;
        }

        if ($user->save()) {
            $log=new Logbook();
            $log->activity_done($description='Se registro al estudiante'. $user->name. 'correctamente' ,$table_id=0,$menu_id=12,$user_id=Auth::id(),$kind_acction=6);
            return back()->with('success','Se ha registrado el usuario exitosamente...');
        }
        else
        {
            return  back()->withErrors('No se ha registrado el usuario...');

        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->first_surname = $request->first_surname;
        $user->second_surname = $request->second_surname;
        $user->gender = $request->gender;
        $user->career = $request->career;
        $user->quarter = $request->quarter;
        $user->group = $request->group;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->user_image = $request->user_image;
        $user->user_image_updated = Carbon::now()->format('Y-m-d');


        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $destiantionPath = 'argon/img/user/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('user_image')->move($destiantionPath, $filename);
            $user->user_image = $destiantionPath . $filename;
        }

        if ($user->save()) {
            $log=new Logbook();
            $log->activity_done($description='Actualizó la información del estudiante ' . $user->name . 'correctamente',$table_id=0,$menu_id=10,$user_id=Auth::id(),$kind_acction=3);

            return back()->with('success','Se ha actualizado el curso exitosamente...');

        }
        else
        {
            return  back()->withErrors('No se ha actualizado el curso...');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update($student_id)
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

        $log->activity_done($description='Accedió a la vista  para Actualizar la información del estudiante.',$table_id=0,$menu_id=10,$user_id=Auth::id(),$kind_acction=1);



        $current_student=User::findOrFail($student_id);
        $rol_available=Role::all()->where('status','=','2');
        $carrers_available=Carrer::all()->where('status','=','2');

        $variables=[
            'menu'=>'alumnos_all',
            'title_page'=>'Usuarios',
            'rol_available'=>$rol_available,
            'current_student'=>$current_student,
            'carrers_available'=>$carrers_available,



        ];

        return view('student.update')->with($variables);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function delete($user_id)
    {
        $role = New Role();
        $log=new Logbook();
        $user = User::findOrFail($user_id);
        $user->status=-2;

        if($user->save()){

            $log->activity_done($description='Borro el registro del estidiante' . $user->name . 'correctamente',$table_id=0,$menu_id=10,$user_id=Auth::id(),$kind_acction=3);

            return back()->with('success','Se ha eliminado el curso exitosamente...')->with('eliminar', 'ok');
        } else {
            return back()->with('success','No se ha eliminado el curso exitosamente...');
        }
    }
}
