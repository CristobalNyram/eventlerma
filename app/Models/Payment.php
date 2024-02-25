<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function getStatusPayment($status_id)
    {
        $answer=[];
        switch ($status_id) {
            case 1:
                $answer['badge']='warning';
                $answer['message']='solicitado';
                return $answer;

                break;

            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            default:
                break;
        }
    }
}
