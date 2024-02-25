<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Logbook;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class MenuController extends Controller
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

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 1) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done('Accedió al módulo de Menús.',0,3,Auth::id(),1);

        $menus=Menu::all();
        $menus_numbers=Menu::all()->count();
        $variables=[
            'menu'=>'menus',
            'title_page'=>'Menus',
            'menus'=>$menus,
            'menus_numbers'=>$menus_numbers,


        ];
        return view('menu.index')->with($variables);
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

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 3) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }

        $variables=[
            'menu'=>'menus',
            'title_page'=>'Menús',
        ];
        return view('menu.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $variables=[
                'menu'=>'menus',
                'title_page'=>'Menus',


         ];

         $validaciones = [
            'title' => 'required|string',
            'description' => 'required',
            'menu_parent' => 'required|min:0|max:50|numeric',
            'order'=>'required|min:1|max:50|numeric',
        ];

         $mensajes = [
            'title.required' => 'No puedes dejar vacío, necesitas agregar un nombre al menú.',
            'title.string' => 'No se permitén caracteres extaños al nombre del menú.',
            'menu_parent.required' => 'Ingresa un número en el menu padre.',
            'order.required' => 'Ingresa un número en orden del menu.',
            'menu_parent.numeric' => 'Ingresa un número en el menu padre.',
            'order.numeric' => 'Ingresa un número en orden del menu.'

        ];

         $this->validate(request(),$validaciones,$mensajes);

         $menu= new Menu();


        if ($menu->new_registration($request) === true) {

          
        $log = new Logbook();


            $log->activity_done($description='Creo un menu.',$table_id=0,$menu_id=3,$user_id=Auth::id(),$kind_acction=6);

            return back()->with('success','Se ha registrado el menú exitosamente...');

        }
        else
        {
            return  back()->withErrors('No se ha registrado el menú...');

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
