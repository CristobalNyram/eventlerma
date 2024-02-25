<?php

namespace App\Http\Controllers;
// use App\Helpers\InfoSystem;


use App\Models\Relrolmenu;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Logbook;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Runtime;

class RoleController extends Controller
{
    public function index()
    {
        // return InfoSystem::nameSystem();

        // die();


        $role = New Role();
        $log=new Logbook();
        ////id del rol y el id del menu
        if($role->checkAccesToThisFunctionality(Auth::user()->role_id,2)==null)
        {
            $variables=[
                'menu'=>'',
                'title_page'=>'Acceso denegado',


            ];
            return view('errors.notaccess')->with($variables);

        }
        $log->activity_done($description='Accedió al módulo de Rol.',$table_id=0,$menu_id=2,$user_id=Auth::id(),$kind_acction=1);


        $roles=Role::all();
        $roles_numbers=Role::all()->count();
        $variables=[
            'menu'=>'role',
            'title_page'=>'Roles',
            'roles'=>$roles,
            'roles_numbers'=>$roles_numbers,


        ];
         return view('role.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = New Role();
        $log=new Logbook();

        if($role->checkAccesToThisFunctionality(Auth::user()->role_id,2)==null)
        {
            $variables=[
                'menu'=>'',
                'title_page'=>'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);

        }

        $variables=[
            'menu'=>'role',
            'title_page'=>'Roles',


        ];
        return view('role.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones = [
            'name' => 'required|string',
            'description' => 'required|string',
            'level'=>'required|min:1|max:50|numeric',
        ];
        $this->validate(request(),$validaciones);

        $role= new Role();

        if ($role->new_registration($request) === true) {


            return back()->with('success','Se ha registrado el rol exitosamente...');

        }
        else
        {
            return  back()->withErrors('No se ha registrado el rol...');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function show(Logbook $logbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Logbook $logbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logbook $logbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $logbook)
    {
        //
    }


    //when we indicate the object this object has a funtion for default and this is findOrFail
    public function assign($role_id)
    {
        $role = New Role();
        $log=new Logbook();

        if($role->checkAccesToThisFunctionality(Auth::user()->role_id,2)==null)
        {
            $variables=[
                'menu'=>'',
                'title_page'=>'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);

        }

        $current_role_name=  Role::findOrFail($role_id);
        $menus_and_roles=Relrolmenu::all()->where('role_id',$role_id);

        // return $menus_and_roles;
        // die();
        $variables=[
            'menu'=>'role',
            'title_page'=>'Roles',
            'current_role_name'=>$current_role_name,
            'menus'=>$menus_and_roles,



        ];


        return view('role.assign_permissions')->with($variables);
    }

    public function assign_permission(Request $request)
    {

        Relrolmenu::where('role_id',$request->role_id)->update(['status'=>-2]);

        $requestData =$request->all();

        foreach ($requestData as $key => $value) {
            if($key=='_token' || $key=='role_id')
            {

            }
            else
            {
                $relrolmenuObj=new Relrolmenu();
                $relrolmenu=$relrolmenuObj->find($key);
                $relrolmenu->status=2;

                if(!$relrolmenu->save())
                {
                    return  back()->withErrors('No se ha actualizado correctamente los permisos...');
                }

            }

        }

        return back()->with('success','Se ha actualizado los permisos exitosamente...');











    }
}
