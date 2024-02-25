<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Logbook;
use App\Models\Role;
use PDF;

class GetBadgeController extends Controller
{
    public function index() 
    {

        $rol= new Role();
        $log= new Logbook();
        if($rol->checkAccesToThisFunctionality(Auth::user()->role_id,44)==null)
        {
           

            
            $variables=[
                'menu'=>'',
                'title_page'=>'Acceso denegado',
             
            ];
            return view('errors.notaccess')->with($variables);

        }

        $log->activity_done($description='Accedió al módulo obtener gafet.',$table_id=0,$menu_id=44,$user_id=Auth::id(),$kind_acction=1);

        $user = auth()->user()->role_id;



        $consulta = Role::join('users', 'roles.id', '=', 'users.id')->select('roles.name', 'users.role_id')->where('roles.id', '=', $user)->get();

        $variables=[
            'menu'=>'badge_all',
            'title_page'=>'Obtener Gafet',
            'consulta' => $consulta,



        ];

        return view('badge.index')->with($variables);

    }

    public function pdf(){

        $user = auth()->user()->role_id;



        $consulta = Role::join('users', 'roles.id', '=', 'users.id')->select('roles.name', 'users.role_id')->where('roles.id', '=', $user)->get();

        $variables=[
            'menu'=>'badge_all',
            'title_page'=>'Obtener Gafet',
            'consulta' => $consulta,
        ];

 

        view()->share('badge.pdf');
         $pdf = PDF::loadView('badge.pdf',['consulta'=>$consulta,]);
         return $pdf->download('Gafet.pdf');
        //  return $pdf->stream('badge.pdf');

       

       //return view('badge.pdf')->with($variables);

    }
}
