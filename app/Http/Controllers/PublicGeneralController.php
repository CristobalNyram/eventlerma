<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Role;
use App\Models\User;
use DateTime;
use Dotenv\Exception\ValidationException;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PublicGeneralController extends Controller
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

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 28) == null) {
            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',
            ];
            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done($description = 'Accedió al módulo de Beneficiarios.', $table_id = 0, $menu_id = 28, $user_id = Auth::id(), $kind_acction = 1);


        $regs_active=User::all()->where('status','=','2')->where('role_id','=','4');
        $regs_active_number=User::all()->where('status','=','2')->where('role_id','=','4')->count();



        $variables=[
            'menu'=>'publicg_all',
            'title_page'=>'Beneficiarios',
            'regs'=>$regs_active,
            'regs_active_number'=> $regs_active_number,



        ];
        return view('admin.public_general.index')->with($variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = New Role();
        $log = new Logbook();

        if ($role->checkAccesToThisFunctionality(Auth::user()->role_id,12) == null) {

            $variables = [
                'menu' => '',
                'title_page' => 'Acceso denegado',

            ];

            return view('errors.notaccess')->with($variables);
        }

        $log->activity_done($description = 'Accedió al módulo de crear Beneficiarios.',$table_id = 0, $menu_id = 41, $user_id = Auth::id(), $kind_acction = 1);

        $variables=[
            'menu'=>'publicg_all',
            'title_page'=>'Crear Beneficiarios',


        ];

        return view('admin.public_general.create')->with($variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd("PRUEBAA");
        try {
            // Validaciones de Laravel
            $request->validate([
                'name' => 'required|string|max:255',
                'first_surname' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed', // La regla confirmed valida que el campo 'password' coincida con 'password_confirmation'
                'password_confirmation' => 'required|string|min:8',
                'second_surname' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'gender' => 'required|in:H,M',
                'email' => 'required|string|email|max:255|unique:users',
                'date_birth' => 'required|date|before_or_equal:today|after_or_equal:1900-01-01',
                'status' => 'required|in:1,2',
                'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'date_birth.before_or_equal' => 'La Fecha de nacimiento no puede ser una fecha futura.',
                'date_birth.after_or_equal' => 'La Fecha de nacimiento debe ser posterior a 1900-01-01.',
            ]);

            // Formateo del Número de teléfono
            #$phone_number = str_replace('-', '', $request->phone_number);
            $phone_number =  $request->phone_number;

            // Iniciar una transacción de base de datos
            DB::beginTransaction();

            // Guardar la Imagen de usuario
            $destinationPath = 'uploads/user/';
            $file = $request->file('user_image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $user_image = $destinationPath . $filename;

            // Crear y guardar el usuario
            $user = new User();
            $user->name = $request->name;
            $user->first_surname = $request->first_surname;
            $user->second_surname = $request->second_surname;
            $user->phone_number = $phone_number;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // Hash de la contraseña
            $user->date_birth = $request->date_birth;
            $user->status = $request->status;
            $user->role_id = 4;
            $user->status = 2;

            $user->user_image = $user_image;
            $user->save();
            // dd("ero");
            // Confirmar la transacción si todo está bien
            DB::commit();
            $log=new Logbook();
            $log->activity_done($description='Se registro al usuario '. $user->name. 'correctamente' ,$table_id=0,$menu_id=12,$user_id=Auth::id(),$kind_acction=6);

            return redirect()->route('publicg_index')->with('success', 'Usuario creado exitosamente.');
        } catch (\Exception $e) {
            // Si hay algún error, deshacer la transacción
            DB::rollback();

            // Devolver mensaje de error
            return redirect()->back()->with(['error' => 'Ha ocurrido un error al crear el usuario. Por favor, inténtelo de nuevo más tarde.'.$e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = New Role();
        $log=new Logbook();
        if($role->checkAccesToThisFunctionality(Auth::user()->role_id,10)==null)
        {
            $variables=[
                'menu'=>'',
                'title_page'=>'Acceso denegado',


            ];
            return view('errors.notaccess')->with($variables);

        }

        $log->activity_done($description='Accedió a la vista  para Actualizar la información del usuario.',$table_id=0,$menu_id=10,$user_id=Auth::id(),$kind_acction=1);



        $reg=User::findOrFail($id);

        $variables=[
            'menu'=>'publicg_all',
            'title_page'=>'Beneficiarios',
            'reg'=>$reg,


        ];

        return view('admin.public_general.edit')->with($variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // Iniciar una transacción
        DB::beginTransaction();

        try {
            // Validaciones de Laravel
            $request->validate([
                'name' => 'string|max:255',
                'first_surname' => 'string|max:255',
                'second_surname' => 'string|max:255',
                'phone_number' => 'max:15',
                'gender' => 'in:H,M',
                'email' => 'string|email|max:255|unique:users,email,'.$id,
                'date_birth' => 'date|before_or_equal:today|after_or_equal:1900-01-01',
                'status' => 'in:1,2,0',
                'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'date_birth.before_or_equal' => 'La Fecha de nacimiento no puede ser una fecha futura.',
                'date_birth.after_or_equal' => 'La Fecha de nacimiento debe ser posterior a 1900-01-01.',
            ]);

            // Validación personalizada de la Fecha de nacimiento

            // Obtener el usuario a actualizar
            $user = User::findOrFail($id);

            // Formateo del Número de teléfono
            #$phone_number = str_replace('-', '', $request->phone_number);
            $phone_number =  $request->phone_number;
            if ($request->has('name')) {
                $user->name = $request->name !== '' ? $request->name : null;
            }

            if ($request->has('first_surname')) {
                $user->first_surname = $request->first_surname !== '' ? $request->first_surname : null;
            }

            if ($request->has('second_surname')) {
                $user->second_surname = $request->second_surname !== '' ? $request->second_surname : null;
            }

            if ($request->has('phone_number')) {
              $user->phone_number = $request->phone_number !== '' ? $request->phone_number : null;
            }

            if ($request->has('gender')) {
                $user->gender = $request->gender !== '' ? $request->gender : null;
            }

            if ($request->has('email')) {
                $user->email = $request->email !== '' ? $request->email : null;
            }

            if ($request->has('date_birth')) {
                $user->date_birth = $request->date_birth !== '' ? $request->date_birth : null;
            }

            if ($request->has('status')) {
                $user->status = $request->status !== '' && $request->status !== 0 ? $request->status : null;
            }

            // Actualizar la Imagen de usuario si se proporcionó una nueva
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');
                $destinationPath = 'uploads/user/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($destinationPath, $filename);
                $user->user_image = $destinationPath . $filename;
            }

            // Actualizar la contraseña si se proporcionó una nueva
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password); // Hash de la nueva contraseña
            }

            $user->save();

            // Commit de la transacción
            DB::commit();

            return  redirect()->route('publicg_index')->with('success', 'Usuario actualizado exitosamente.');
        } catch (\Exception $e) {
            // En caso de error, hacer rollback de la transacción
            DB::rollback();
            return redirect()->back()->withErrors('Error al actualizar el usuario: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $role = New Role();
        $log=new Logbook();
        $user = User::findOrFail($id);
        $user->status=-2;

        if($user->save()){

            $log->activity_done($description='Borro el registro del usuario' . $user->name . 'correctamente',$table_id=0,$menu_id=10,$user_id=Auth::id(),$kind_acction=3);

            return back()->with('success','Se ha eliminado el curso exitosamente...')->with('eliminar', 'ok');
        } else {
            return back()->with('success','No se ha eliminado el curso exitosamente...');
        }
    }
}
