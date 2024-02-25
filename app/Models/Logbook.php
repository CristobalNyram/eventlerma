<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function menus()
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }

    public function activity_done($description,
    $table_id,
    $menu_id,
    $user_id,
    $kind_acction)
    {

        $log=new Logbook();
        $log->description=$description;
        $log->table_id=$table_id;
        $log->menu_id=$menu_id;
        $log->user_id=$user_id;
        $log->actions_id=$kind_acction;
        $log->save();


    }
}
