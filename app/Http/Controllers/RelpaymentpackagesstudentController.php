<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelpaymentpackagesstudentController extends Controller
{
     public function index()
     {

     }
     public function paymenstRequest(Request $request)
     {
        return json_encode('a');

        /*
         $payment_package= new Relpaymentpackagesstudent();
         $payment_package->user_student_id= Auth::id();
         $payment_package->package_id= $package_id;
         $payment_package->status=1;
$package_id
         if($payment_package->save())
         {
             // return
         }
         else
         {
             // return

         }*/




     }
     public function aprovePaymetPackageStudent($relpaymentpackagesstudents_id)
     {

        /* $payment_package=RelPaymentPackagesStudents::findOrFail($relpaymentpackagesstudents_id);
         $payment_package->status=2;
         $payment_package->user_approved_id=Auth::id();


         if($payment_package->update())
         {
             // return
         }
         else
         {
             // return

         }
         */




     }
}
