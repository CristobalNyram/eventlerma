<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Logbook;
use App\Models\Example;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = new Role();
        if($role->checkAccesToThisFunctionality(Auth::user()->role_id,10)==null)
        {
            $variables=[
                'menu'=>'',
                'title_page'=>'No puedes pasar',


            ];
            return view('errors.notaccess')->with($variables);

        }
        $log= new Logbook();

        $log->activity_done($description='Accedió a la vista de estudiantes.',$table_id=0,$menu_id=4,$user_id=Auth::id(),$kind_acction=1);
        
        
        $users_active=User::all()->where('status','=','2')->where('role_id','=','3');
        $users_active_number=User::all()->where('status','=','2')->where('role_id','=','3')->count();
      

       
       
        $variables=[
            'menu'=>'alumnos_all',
            'title_page'=>'Ejemplo',
            'users_actives'=>$users_active,
            'users_active_number'=> $users_active_number,
         



        ];
        return view('example.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function show(Example $example)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function edit(Example $example)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Example $example)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function destroy(Example $example)
    {
        //
    }
}
