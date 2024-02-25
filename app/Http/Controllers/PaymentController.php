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

class PaymentController extends Controller
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

          $log->activity_done($description = 'Accedió al módulo de Pagos.', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 1);


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
    public function payment_cancel($payment_id)
    {

        $request_payment = Relpaymentpackagesstudent::findOrFail($payment_id);
        $request_payment->status=-2;
        $request_payment->user_canceled_id= Auth::id();
        $request_payment->canceled_date= now();

        $log = new Logbook();
        $log = new Logbook();

        if($request_payment->save()){
            $log->activity_done($description = 'Cancelo la solicitud de pago del paquete ' . $request_payment->title . ' que tenia por  ID interno el '.$request_payment->id.'', $table_id = 0, $menu_id = 40, $user_id = Auth::id(), $kind_acction = 3);
            return back()->with('success','Se ha eliminado el cancelado exitosamente...')->with('eliminar', 'ok');
        } else {
            return back()->with('success','No se ha cancelado...');
        }
        return '1';

    }
    public function paymenstRequest(Request $request)
    {
        $role = New Role();
        $log=new Logbook();
        $answer=[];
        $is_requrired_package=Relpaymentpackagesstudent::all()->where('user_student_id','=',Auth::id())->where('status','=',1)->first();
        if($is_requrired_package){

                $log->activity_done($description = 'Intento realizar una solicitud de pago para el paquete con ID '.$request->package_id.'', $table_id = 0, $menu_id = 47, $user_id = Auth::id(), $kind_acction = 1);
                $answer['status']=-2;
                $answer['title']='ERROR';
                $answer['message']='Usted ya ha hecho una solicitud pago...';
                return $answer;

        }else{
                $new_required_package=new Relpaymentpackagesstudent();
                $new_required_package->user_student_id=Auth::id();
                $new_required_package->package_id=$request->package_id;
                $new_required_package->status=1;

            if($new_required_package->save()){
                $log->activity_done($description = 'Realizo una solicitud de pago para el paquete con ID '.$request->package_id.'', $table_id = 0, $menu_id = 47, $user_id = Auth::id(), $kind_acction = 1);

                $answer['status']=2;
                $answer['title']='Éxito';
                $answer['message']='Su solicitud de pago se ha procesado correctamente...';
                return $answer;
            }else{
                $answer['status']=-2;
                $answer['title']='ERROR';
                $answer['message']='Se produjó un error al momento de procesar los datos...';
                return $answer;
            }



        }


    }
    public function payment_aprove($payment_id)
    {
        $request_payment = Relpaymentpackagesstudent::findOrFail($payment_id);
        $request_payment->status=2;
        $request_payment->user_approved_id= Auth::id();
        $request_payment->approved_date= now();

        $log = new Logbook();
        $log = new Logbook();

        if($request_payment->save()){
            $log->activity_done($description = 'Aprobo la solicitud de pago del paquete ' . $request_payment->title . ' que tiene por  ID interno el '.$request_payment->id.'', $table_id = 0, $menu_id = 40, $user_id = Auth::id(), $kind_acction = 3);
            return back()->with('success','Se ha aprobado el paquete exitosamente...')->with('aprobar', 'ok');
        } else {
            return back()->with('success','No se ha cancelado...');
        }
        return '1';
    }

}
