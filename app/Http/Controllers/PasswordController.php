<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Logbook;

class PasswordController extends Controller
{
    public function update($speaker_id)
    {
        $rol= new Role();
        if ($rol->checkAccesToThisFunctionality(Auth::user()->role_id, 29) == null) {
            $variables = [
              'menu' => '',
              'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
          }
          $log= new Logbook();
          $log->activity_done($description = 'Accedió al módulo de Actualizar Contraseña.', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 1);


        $current_user=User::findOrFail($speaker_id);
         $rol_available=Role::all()->where('status','=','2');

        $variables=[
            'menu'=>'users_all',
            'title_page'=>'Usuarios',
             'rol_available'=>$rol_available,
            'current_user'=>$current_user,



        ];

        return view('password.update')->with($variables);
    }

    public function edit(Request $request)
    {

        $user = User::findOrFail($request->id);
        $user->password = Hash::make($request->password) ;

        if ($user->save()) {
            $log= new Logbook();
           $log->activity_done($description='Actualizo la contraseña correctamente del usuario' . $user->name . '',$table_id=0,$menu_id=10,$user_id=Auth::id(),$kind_acction=3);

            return back()->with('success','Se ha actualizado el curso exitosamente...');

        }
        else
        {
            return  back()->withErrors('No se ha actualizado el curso...');

        }
    }
}
