<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relpaymentpackagesstudent extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(User::class,'user_student_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
    public function get_name_status()
    {
        $answer=[];

        switch ($this->status) {
            case '1':

                return 'solicitado' ;
                break;

            case '2':

                return 'pagado' ;
                break;
        }
    }
    public function get_name_badge_status()
    {
        $answer=[];

        switch ($this->status) {
            case '1':

                return 'badge-warning' ;
                break;

            case '2':

                return 'badge-success' ;
                break;
        }
    }


}
