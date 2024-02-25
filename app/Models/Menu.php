<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public function new_registration($request)
    {

        $menu= new Menu();
        $menu->title=$request->title;
        $menu->description=$request->description;
        $menu->menu_parent=$request->menu_parent;
        $menu->order=$request->order;

        if( $menu->save()===true)
        {
          $list_of_rol = Role::all();
                for ($i=0; $i < count($list_of_rol) ; $i++) {

                    $relrolmenu=new Relrolmenu();
                    $relrolmenu->menu_id=$menu->id;
                    $relrolmenu->role_id=$list_of_rol[$i]->id;
                    $relrolmenu->status='-2';
                    $relrolmenu->created_at=now();

                    if(!$relrolmenu->save())
                    {
                         return false;


                    }

                }
                return true;
        }
        else
        {
            return false;
        }


    }
}
