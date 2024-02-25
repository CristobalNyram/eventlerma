<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Configuration;
use App\Models\Logbook;

class SettingController extends Controller
{
  public function index()
  {

    $rol = new Role();


    if ($rol->checkAccesToThisFunctionality(Auth::user()->role_id, 19) == null) {
      $variables = [


        'menu' => '',
        'title_page' => 'Acceso denegado',


      ];
      return view('errors.notaccess')->with($variables);
    }

    $log = new Logbook();


    $log->activity_done($description = 'Accedió al módulo de consulta de Configuración', $table_id = 0, $menu_id = 19, $user_id = Auth::id(), $kind_acction = 1);

    $configuration_active = Configuration::all();
    $configuration_active_number = Configuration::all()->count();

    $variables = [
      'menu' => 'setting_all',
      'title_page' => 'Configuración',
      'configuration_active' => $configuration_active,
      'configuration_active_number' => $configuration_active_number,
    ];
    return view('setting_local.index')->with($variables);
  }

  public function update($setting_id)
  {

    $rol = new Role();


    if ($rol->checkAccesToThisFunctionality(Auth::user()->role_id, 19) == null) {
      $variables = [
        'menu' => '',
        'title_page' => 'Acceso denegado',
      ];
      return view('errors.notaccess')->with($variables);
    }

    $log = new Logbook();

    $log->activity_done($description = 'Accedió al modelo actualizar configuración del sistema', $table_id = 0, $menu_id = 22, $user_id = Auth::id(), $kind_acction = 1);

    $current_setting = Configuration::findOrFail($setting_id);

    $variables = [
      'menu' => 'souvenirs_all',
      'title_page' => 'Configuración',
      'current_setting' => $current_setting,
    ];
    return view('setting_local.update')->with($variables);
  }

  public function edit(Request $request)
  {
    $setting = Configuration::findOrFail($request->id);
    $setting->title = $request->title;
    $setting->description = $request->description;
    $setting->content = $request->content;

    if($request -> hasFile ('content')){
      $file = $request ->file('content');
      $destiantionPath = 'argon/brand/';
      $filename =  $file->getClientOriginalName();
      $uploadSuccess = $request->file('content')->move($destiantionPath, $filename);
      $setting->content = $filename;

     }



    if ($setting->save()) {

      $log = new Logbook();

      $log->activity_done($description = 'Actualizo la configuración del sistema' . $setting->name . 'correctamente', $table_id = 0, $menu_id = 22, $user_id = Auth::id(), $kind_acction = 3);
      return back()->with('success', 'Se ha actualizado el sistema exitosamente...');
    } else {
      return  back()->withErrors('No se ha actualizado el sistema...');
    }
  }
}
