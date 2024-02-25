
<?php

// use App\Http\Controllers\Relpaymentpackagesstudent;

use App\Http\Controllers\UserController;
use App\Models\Role;
use App\Models\Course;
use App\Models\Relpaymentpackagesstudent;


use App\Models\Configuration;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Relcoursestudent;
use App\Models\Relpackagessourvenir;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

////Here is for security of the system
if (! function_exists('check_acces_to_this_permission')) {


    function check_acces_to_this_permission($role_id,$menu_id)
    {
        $role = New Role();

      if($role->checkAccesToThisFunctionality($role_id,$menu_id)==null)
      {
        return false;
      }
      else
      {
        return true;
      }
    }
}





if (! function_exists('config_name_system')) {

          //el id corresponde a la tabla configurarion en el 1d 2
            function config_name_system()
            {
            $name_system =Configuration::findOrFail(2);
            if($name_system==null)
            {
                return 'Sin nombre';
            }
            else
            {
                return $name_system->content;
            }
            }
}
if (! function_exists('config_icon_logo_system')) {

    //el id corresponde a la tabla configurarion en el 1d 2
      function config_icon_logo_system()
      {
        $logo_icon =Configuration::findOrFail(1);
        if($logo_icon==null)
        {
            return 'Sin nombre';
        }
        else
        {
            return $logo_icon->content;
        }
      }
}
if (! function_exists('config_author_system')) {

    //el id corresponde a la tabla configurarion en el 1d 2
      function config_author_system()
      {
        $author_system =Configuration::findOrFail(4);
        if($author_system==null)
        {
            return 'Sin nombre';
        }
        else
        {
            return $author_system->content;
        }
      }
}

//helper for check payments start

if(! function_exists('check_if_paid_package')) {
    //check if the user has bought his/her ticket
    function check_if_paid_package()
    {
        $check_if_paid_package = Relpaymentpackagesstudent::where('user_student_id', '=', Auth::id())->where('status', '=',2)->first();
    }
}

if (! function_exists('check_if_requested_package')) {
    //check if the user has requested the package 
    function check_if_requested_package()
    {
        $check_if_requested_package = Relpaymentpackagesstudent::where('user_student_id', '=', Auth::id())->where('status', '=',1)->first();
        if($check_if_requested_package)
        {
            return true;
        }else
        {
            return false;
        }
    }
}
if (! function_exists('check_if_enrolled_in_course')) {

    //check if the user has enrrolled in any  course
    function check_if_enrolled_in_course()
    {
            
            $check_if_enrolled_in_course = Relcoursestudent::where('user_student_id','=',Auth::id())->where('status','=',2)->first();
            if($check_if_enrolled_in_course == $check_if_enrolled_in_course)
            {
                return true;
            }else
            {
                return false;
            }
    }
}

if (! function_exists('check_if_requested_course_paid_out')) {

    //check if the user has enrrolled in any  course
    function check_if_requested_course_paid_out()
    {
            $check_if_enrolled_in_course = Relcoursestudent::where('user_student_id','=',Auth::id())->where('status','=',2)->first();
            if( $check_if_enrolled_in_course)
            {
                return true;
            }else
            {
                return false;
            }
    }
}

if (! function_exists('check_if_requested_package_paid_out')) {

    //check if the user has enrrolled in any  course
    function check_if_requested_package_paid_out()
    {
        $check_if_requested_package = Relpaymentpackagesstudent::where('user_student_id','=',Auth::id())->where('status','=',2)->first();
        if( $check_if_requested_package)
        {
            return true;
        }else
        {
            return false;
        }
    }
}

if (! function_exists('get_id_request_payment')) {

    //check if the user has enrrolled in any  course
    function get_id_request_payment()
    {
        $request_payment = Relpaymentpackagesstudent::where('user_student_id','=',Auth::id())->where('status','=',1)->first();
        if( $request_payment)
        {
            return $request_payment->id;
        }else
        {
            return false;
        }
    }
}

//helpers for check payments end

//helpers for check register course start

if (! function_exists('check_if_requested_course')) {
    //check if the user has requested the package 
    function check_if_requested_course()
    {
        $check_if_requested_course = Relcoursestudent::where('user_student_id', '=', Auth::id())->where('status', '=','2')->first();
        if($check_if_requested_course)
        {
            return true;
        }else
        {
            return false;
        }
    }
}

if (! function_exists('card_course')) {
    //check if the user has requested the package 
    function card_course()
    {
        $data = Course::join('relcoursestudents', 'courses.id', '=', 'relcoursestudents.course_id')->select('courses.title', 'courses.url_img', 'courses.description')->where('courses.id', '=', 'relcoursestudents.course_id')->get();

        return $data;
    
    }
}

//helpers for statistics of app

if(! function_exists('check_register_student')) {
    //check register the student
    function check_register_student()
    {
        
        $users_active_number=User::all()->where('status','=','2')->where('role_id', '=', '4')->count();
        
        return $users_active_number;
    }
}

if(! function_exists('check_paid_packages')) {
    function check_paid_package()
    {
      $paid_package=Relpaymentpackagesstudent::all()->where('status','=','2')->count();

      return $paid_package;
    }
}

if(! function_exists('check_requested_packages')) {
    function check_requested_package()
    {
      $requested_package=Relpaymentpackagesstudent::all()->where('status','=','1')->count();

      return $requested_package;
    }
}

if(! function_exists('check_student_register_course')) {
    function check_student_register_course()
    {
      $register_course=Relcoursestudent::all()->where('status','=','2')->count();

      return $register_course;
    }
}

//Helpers incorporate registration

if(! function_exists('check_student_enrollment')) {
    function check_student_enrollment()
    {
      $enrollment = Auth::user()->enrollment;
      $register_enroll=User::where('enrollment','=',NULL)->where('id','=',Auth::id())->first();

      if($register_enroll) {
        return true;
      } else {
        return false;
      }

    }
}