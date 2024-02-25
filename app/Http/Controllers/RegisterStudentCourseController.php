<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Role;
use App\Models\Logbook;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Relpaymentpackagesstudent;
use App\Models\Payment;

class RegisterStudentCourseController extends Controller
{
    public function index()
    {
        $role = New Role();
        $log=new Logbook();


        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 29) == null) {
            $variables = [
              'menu' => '',
              'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
          }

          $log->activity_done($description = 'Accedió al módulo de rEGISTRO DE Curso.', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 1);


        $users_active=User::all()->where('status','=','2');
        $users_active_number=User::all()->where('status','=','2')->count();
        $packages_active=Package::all()->where('status','=','2');
        $users_active_number=User::all()->where('status','=','2')->count();
        $packages_active=Package::all()->where('status','=','2');

        $payments_student=Relpaymentpackagesstudent::all()->where('status','>=','1');
        $objPayment=new Payment();


        $variables=[
            'menu' => 'payments',
            'title_page'=>'Pagos',
            'users_actives'=>$users_active,
            'users_active_number'=> $users_active_number,
            'packages_active'=> $packages_active,
            'payments_student'=>$payments_student,
            'objPayment'=> $objPayment



        ];
        return view('payments.index')->with($variables);
    }
}
