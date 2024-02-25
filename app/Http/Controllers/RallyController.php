<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Rally;
use App\Models\Logbook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RallyController extends Controller
{
    //
    public function index()
    {

        $role = new Role();
        $log = new Logbook();

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 31) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }
        $log->activity_done($description = 'Accedió al módulo de Rallys', $table_id = 0, $menu_id = 19, $user_id = Auth::id(), $kind_acction = 1);
        $rallys_active =  Rally::all()->where('status', '=', '2');
        $rallys_active_number = Rally::all()->where('status', '=', '2')->count();

        $variables = [
            'menu' => 'rallys_all',
            'title_page' => 'Rally',
            'rallys_actives' => $rallys_active,
            'rallys_active_number' => $rallys_active_number,
        ];
        return view('rallys.index')->with($variables);
    }

    public function edit(Request $request)
    {
        $rallys = Rally::findOrFail($request->id);
        $rallys->name = $request->name;
        $rallys->description = $request->description;
        $rallys->requirements = $request->requirements;
        $rallys->price = $request->price;
        $rallys->location = $request->location;
        $rallys->img = $request->img;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destiantionPath = 'argon/img/rally/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('img')->move($destiantionPath, $filename);
            $rallys->img = $destiantionPath . $filename;
        }

        if ($rallys->save()) {
            $log = new Logbook();
            $log->activity_done($description = 'Actualizo el rally ' . $rallys->name . ' correctamente', $table_id = 0, $menu_id = 33, $user_id = Auth::id(), $kind_acction = 3);
            return back()->with('success', 'Se ha actualizado el rally exitosamente...');
        } else {
            return  back()->withErrors('No se ha actualizado el rally...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rally  $rally
     * @return \Illuminate\Http\Response
     */

    public function update($rally_id)
    {
    $role = new Role();
    $log = new Logbook();
    if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 19) == null) {
        $role = new Role();
        $log = new Logbook();
        if ($log->checkAccesToThisFunctionality(Auth::user()->role_id, 19) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }
        $log->activity_done($description = 'Accedió al módulo de Actualizar Rally.', $table_id = 0, $menu_id = 22, $user_id = Auth::id(), $kind_acction = 1);
        $current_rally = Rally::findOrFail($rally_id);
        $variables = [
            'menu' => 'rally_all',
            'title_page' => 'Rallys',
            'current_rally' => $current_rally,
        ];
        return view('rallys.update')->with($variables);
    }
}

    // Show the form for creating a new resource.

    public function create()
    {
        $role = new Role();
        $log = new Logbook();
        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 31) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }
        $log->activity_done($description = 'Accedió al módulo de Crear Rally.', $table_id = 0, $menu_id = 22, $user_id = Auth::id(), $kind_acction = 1);

        $rally_available = Rally::all()->where('status', '=', '2');
        $variables = [
            'menu' => 'rallys_all',
            'title_page' => 'Rallys',
            'rally_available' => $rally_available,
        ];
        return view('rallys.create')->with($variables);
    }

    // Store a newly created resource in storage.

    public function store(Request $request)
    {
        $role = new Role();
        $log = new Logbook();


        $rally = new Rally();
        $rally->name = $request->name;
        $rally->description = $request->description;
        $rally->requirements = $request->requirements;
        $rally->price = $request->price;
        $rally->location = $request->location;
        $rally->img = $request->img;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destiantionPath = 'argon/img/rally/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('img')->move($destiantionPath, $filename);
            $rally->img = $destiantionPath . $filename;
        }

        $role = new Role();
        $log = new Logbook();

        if ($rally->save()) {

            $log->activity_done($description = 'Creo el Rally ' . $rally->name . ' correctamente', $table_id = 0, $menu_id = 22, $user_id = Auth::id(), $kind_acction = 6);

            return back()->with('success', 'Se ha registrado el Rally exitosamente...');
        } else {
            return  back()->withErrors('No se ha registrado el Rally...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rally  $rally
     * @return \Illuminate\Http\Response
     */
    public function delete($rally_id)
    {
        $role = new Role();
        $log = new Logbook();
        $rally = Rally::findOrFail($rally_id);
        $rally->status = -2;
        if ($rally->save()) {

            $role->activity_done($description = 'Eliminó el Rally ' . $rally->name . ' correctamente', $table_id = 0, $menu_id = 22, $user_id = Auth::id(), $kind_acction = 4);
    $log->activity_done($description = 'Eliminó el Rally ' . $rally->name . ' correctamente', $table_id = 0, $menu_id = 22, $user_id = Auth::id(), $kind_acction = 4);

            return back()->with('success', 'Se ha borrado el Rally exitosamente...')->with('eliminar', 'ok');
        } else {
            return back()->with('success', 'No se ha borrado el Rally exitosamente...');
        }
    }
}
