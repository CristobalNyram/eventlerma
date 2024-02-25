<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function new_registration($request)
    {
        $role= new Role();
        $role->name=$request->name;
        $role->description=$request->description;

        $role->level=$request->level;
        $role->created_at=now();

        if( $role->save()===true)
        {
            $list_of_menu = Menu::all();
                for ($i=0; $i < count($list_of_menu) ; $i++) {

                    $relrolmenu=new Relrolmenu();
                    $relrolmenu->menu_id=$list_of_menu[$i]->id;
                    $relrolmenu->role_id=$role->id;
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

    public function checkAccesToThisFunctionality($role_id,$menu_id)
    {

        $haveThispermission= Relrolmenu::where('role_id',$role_id)->where('menu_id',$menu_id)->where('status',2)->first();

        if($haveThispermission==null)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function relrolmenu()
    {
        return $this->hasMany(Relrolmenu::class,'id');
    }
    public function relroleuser()
    {
        return $this->hasMany(User::class,'role_id');
    }




}
