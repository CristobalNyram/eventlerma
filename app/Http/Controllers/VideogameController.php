<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Events\Looping;
use Illuminate\Support\Facades\Auth;

class VideogameController extends Controller
{
    function index(){
        $role = New Role();
        $log = new Logbook();
        $log->activity_done($description = 'Accedió al módulo de video juego.', $table_id = 0, $menu_id = 28, $user_id = Auth::id(), $kind_acction = 1);
        $variables=[
            'menu'=>'videogame',
            'title_page'=>'Game',
        ];
        return redirect('https://cristobalnyram.github.io/game-freedomday/');
    }
}
