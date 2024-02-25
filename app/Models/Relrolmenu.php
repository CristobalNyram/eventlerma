<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relrolmenu extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
    public function menus()
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }
}
