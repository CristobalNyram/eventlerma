<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Logbook;
use App\Models\OriginState;
use App\Models\TypeSponsor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = New Role();
        $log = new Logbook();

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 29) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done($description = 'Accedió al módulo de empresas.', $table_id = 0, $menu_id = 29, $user_id = Auth::id(), $kind_acction = 1);

        $sponsors_active = Sponsor::select('sponsors.*',"origin_states.name as origin_state_name","type_sponsors.name as type_sponsor_name")
        ->leftJoin('origin_states', 'origin_states.id', '=', 'sponsors.origin_state_id')
        ->leftJoin('type_sponsors', 'type_sponsors.id', '=', 'sponsors.type_sponsor_id')

        ->where('sponsors.status', '=', '2')
        ->get();


        $sponsors_active_number=Sponsor::all()->where('status','=','2')->count();

        $variables=[
            'menu'=>'sponsors_all',
            'title_page'=>'Empresas',
            'sponsors_actives'=>$sponsors_active,
            'sponsors_active_number'=> $sponsors_active_number,

        ];
        return view('sponsors.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $role = New Role();
        $type_sponsor=TypeSponsor::all()->where('status','=','2');
        $origin_state=OriginState::all()->where('status','=','2');

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 29) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',



            ];
            return view('errors.notaccess')->with($variables);
        }

        $variables=[
            'menu'=>'sponsors_all',
            'title_page'=>'Crear empresa',
            'type_sponsor' =>$type_sponsor,
            'origin_state' =>$origin_state,
        ];
        return view('sponsors.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      #VALIDACIONES INICIO
          // Definir reglas de validación
    $rules = [
        'name' => 'required|string|max:255',
        'slogan' => 'required|string|max:255',
        'url_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ejemplo: Archivo de imagen hasta 2MB
        'slug' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'type_sponsor_id' => 'required|exists:type_sponsors,id', // Asegura que el tipo de sponsor exista en la tabla tipo_sponsors
        'origin_state_id' => 'required|exists:origin_states,id', // Asegura que el estado de origen exista en la tabla states
    ];

    // Mensajes de error personalizados (opcional)
    $customMessages = [
        'url_img.required' => 'La imagen del sponsor es obligatoria.',
        'url_img.image' => 'El archivo debe ser una imagen.',
        'url_img.mimes' => 'Formatos de imagen permitidos: jpeg, png, jpg, gif.',
        'url_img.max' => 'La imagen no debe ser mayor a 2MB.',
        'type_sponsor_id.exists' => 'El tipo de sponsor seleccionado no es válido.',
        'origin_state_id.exists' => 'El estado de origen seleccionado no es válido.',
    ];

    // Validar los datos
    $validator = Validator::make($request->all(), $rules, $customMessages);

    // Si la validación falla, redirigir de nuevo con errores
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    #VALIDACION FIN

        // dd( $request->all());
      $sponsor =new Sponsor();
      $sponsor->name = $request->name;
      $sponsor->slogan = $request->slogan;
      $sponsor->url_img = $request->url_img;
      $sponsor->slug = $request->slug;
      $sponsor->phone_number = $request->phone_number;
      $sponsor->email = $request->email;
      $sponsor->type_sponsor_id = $request->type_sponsor_id;
      $sponsor->origin_state_id = $request->origin_state_id;




      if($request -> hasFile ('url_img')){
        $file = $request ->file('url_img');
        $destiantionPath = 'argon/img/sponsor/';
        $filename = time() .'-'. $file->getClientOriginalName();
        $uploadSuccess = $request->file('url_img')->move($destiantionPath, $filename);
        $sponsor->url_img = $destiantionPath . $filename;
      }

        if ($sponsor->save()) {
            $log=new Logbook();
            $log->activity_done($description = 'Creó la empresa ' . $sponsor->name . 'correctamente', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 6);
            return redirect()->route('sponsor_index')->with('success','Se ha registrado la empresa exitosamente...');

        }
        else
        {
            return  back()->withErrors('No se ha registrado...');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $sponsor = Sponsor::findOrFail($request->id);
        $sponsor->name = $request->name;
        $sponsor->slogan = $request->slogan;
        $sponsor->slug = $request->slug;
        $sponsor->phone_number = $request->phone_number;
        $sponsor->email = $request->email;
        $sponsor->type_sponsor_id = $request->type_sponsor_id;
        $sponsor->origin_state_id = $request->origin_state_id;



        if($request -> hasFile('url_img')){
          $file = $request ->file('url_img');
          $destiantionPath = 'argon/img/sponsor/';
          $filename = time() .'-'. $file->getClientOriginalName();
          $uploadSuccess = $request->file('url_img')->move($destiantionPath, $filename);
          $sponsor->url_img = $destiantionPath . $filename;
         # $sponsor->url_img = $request->url_img;

        }

        $role = new Role();
        $log = new Logbook();


        if ($sponsor->save()) {
        $log->activity_done($description = 'Actualizó la empresa ' . $sponsor->name . ' correctamente', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 3);
            return redirect()->route('sponsor_index')->with('success', 'Se ha actualizado la empresa exitosamente...');
        } else {
          return  back()->withErrors('No se ha actualizado la empresa...');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update($sponsor_id)
    {
        $role = new Role();
        $log = new Logbook();
            if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 29) == null) {
            $variables = [
            'menu' => '',
            'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }
        $log->activity_done($description = 'Accedió al módulo de Actualizar emmpresa.', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 1);

        $current_sponsor = Sponsor::findOrFail($sponsor_id);
        $type_sponsor=TypeSponsor::all()->where('status','=','2');
        $origin_state=OriginState::all()->where('status','=','2');

          $variables = [
            'menu' => 'sponsors_all',
            'title_page' => 'empresas',
            'type_sponsor' => $type_sponsor,
            'origin_state' => $origin_state,

            'current_sponsor' => $current_sponsor,
          ];
          return view('sponsors.update')->with($variables);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */


    public function delete($sponsor_id)
  {
    $role = new Role();
    $log = new Logbook();
    $sponsor = Sponsor::findOrFail($sponsor_id);
    $sponsor->status=-2;
    if($sponsor->save()){
      $log->activity_done($description = 'Eliminó la empresa ' . $sponsor->name . 'correctamente', $table_id = 0, $menu_id = 30, $user_id = Auth::id(), $kind_acction = 4);
      return back()->with('success', 'Se ha borrado el sponsor exitosamente...')->with('eliminar', 'ok');
    }else{
      return back()->with('success', 'No se ha borrado el sponsor exitosamente...');
    }
  }
}
