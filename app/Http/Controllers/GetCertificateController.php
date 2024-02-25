<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Logbook;
use App\Models\Role;
use PDF;

class GetCertificateController extends Controller
{
    public function index() 
    {

        $rol= new Role();
        $log= new Logbook();
        if($rol->checkAccesToThisFunctionality(Auth::user()->role_id,45)==null)
        {
           

            
            $variables=[
                'menu'=>'',
                'title_page'=>'Acceso denegado',
             
            ];
            return view('errors.notaccess')->with($variables);

        }

        $log->activity_done($description='Accedió al módulo obtener certificado.',$table_id=0,$menu_id=44,$user_id=Auth::id(),$kind_acction=1);

        $user = auth()->user()->role_id;



        $consulta = Role::join('users', 'roles.id', '=', 'users.id')->select('roles.name', 'users.role_id')->where('roles.id', '=', $user)->get();

        $variables=[
            'menu'=>'certificate_all',
            'title_page'=>'Obtener Certificado',
            'consulta' => $consulta,



        ];

        return view('certificate.index')->with($variables);

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
         $pdf = PDF::loadView('certificate.pdf',['consulta'=>$consulta,]);
         return $pdf->setPaper('a4', 'landscape')->download('Certificado.pdf');
        //  return $pdf->setPaper('a4', 'landscape')->stream('certificate.pdf');

       

       //return view('badge.pdf')->with($variables);

    }
}
