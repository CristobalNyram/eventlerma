<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAttended;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventAttendedController extends Controller
{

    public function enrroll_to_event($event_id,$user_id) {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para inscribirte a eventos.');
        }

        // Obtener el evento por su ID
        $event = Event::find($event_id);

        // Verificar si el evento existe
        if (!$event) {
            return redirect()->back()->with('error', 'El evento no existe.');
        }

        $existingRegistration = EventAttended::where('event_id', $event_id)
        ->where('attendee_id', auth()->id())
        ->where('status', 2)
        ->first();

        if ($existingRegistration) {
        return redirect()->back()->with('error', 'Ya estás inscrito en este evento.');
        }

        $now = Carbon::now();
        $eventDate = Carbon::parse($event->date);

        if ($now->greaterThanOrEqualTo($eventDate)) {
            return redirect()->back()->with('error', 'El evento ya ha pasado.');
        }

        // Verificar si hay espacio disponible para inscribirse
        $attendeesCount = EventAttended::where('event_id', $event_id)
        ->where('payment_status',2)
        ->count();

        if ($attendeesCount >= $event->capacity) {
            return redirect()->back()->with('error', 'El evento está lleno. No hay espacio disponible.');
        }

        // Verificar si el evento tiene costo
        if ($event->cost > 0) {

            $eventAttended = new EventAttended();
            $eventAttended->event_id = $event_id;
            // $eventAttended->payment_status = 2;
            $eventAttended->payment_method = "pendiente";
            $eventAttended->status = 2;
            $eventAttended->attendee_id = auth()->id();
            $eventAttended->save();

            #return redirect()->back()->with('success', 'Te has registrado exitosamente al evento.');
            // $hashUserId=Hash::make($user_id);
            $hashUserId = Crypt::encryptString($user_id);

            return  redirect()->route('event_payment_form', ['event_id' => $event_id,"user_id"=> $hashUserId]);
        } else {

            $eventAttended = new EventAttended();
            $eventAttended->event_id = $event_id;
            $eventAttended->payment_status = 2;
            $eventAttended->payment_method = "gratis";
            $eventAttended->status = 2;
            $eventAttended->attendee_id = auth()->id();
            $eventAttended->save();

            return redirect()->back()->with('success', 'Te has registrado exitosamente al evento.');
        }



    }

    public function event_payment_form($event_id,$user_id) {
        // echo "hola";
          // Desencriptar el ID del usuario
          $userIdNormal = Crypt::decryptString($user_id);

          $event = Event::find($event_id);

          $user = User::find($userIdNormal);

            if (!$event) {
                return redirect()->back()->with('error', 'El evento no existe.');
            }

            if (!$user) {
                return redirect()->back()->with('error', 'El usuario no existe.');
            }

            $eventAttended = EventAttended::where('event_id', $event_id)
                ->where('attendee_id', $userIdNormal)
                ->first();

            if (!$eventAttended) {
                    return redirect()->back()->with('error', 'El ticket no existe.');
            }

             if ($eventAttended->payment_status==2) {
                return redirect()->back()->with('error', 'El registro ya se pagó.');
            }

            $variables=[
                'event' => $event,
                'eventAttended' => $eventAttended,
                'user' => $user,

            ];

        return view('home_page.event_payment_form')->with($variables);


    }

    public function view_badge_event($event_id,$user_id) {

        // echo $user_id;
        // die();


        $user = User::findOrFail($user_id); // Obtener el usuario por su ID

        // Obtener el evento por su ID
        $event = Event::find($event_id);

        // Verificar si el evento existe
        if (!$event) {
            return redirect()->back()->with('error', 'El evento no existe.');
        }

        $existingRegistration = EventAttended::where('event_id', $event_id)
        ->where('attendee_id', $user_id)
        ->where('status', 2)
        ->first();

        if (!$existingRegistration) {
        return redirect()->back()->with('error', 'No estás inscrito en este evento.');
        }

        $variables=[
            'menu'=>'badge_all',
            'title_page'=>'Obtener Gafet',
            'user' => $user,
            'event' => $event,
            'existingRegistration' => $existingRegistration,
        ];



        view()->share('badge.pdf');
        // $pdf = PDF::loadView('badge.pdf', ['consulta' => $consulta])->setPaper('auto');
        // return $pdf->download('Gafet.pdf');
        $pdf = PDF::loadView('badge.pdf',$variables)->setPaper('auto');
        return $pdf->stream('Gafete.pdf');
    }

    public function event_upload_payment_form(Request $request, $event_id, $user_id)
    {

        $rules = [
            'comprobante' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ejemplo: Archivo de imagen hasta 2MB
        ];

        // Mensajes de error personalizados (opcional)
        $customMessages = [
            'comprobante.required' => 'La imagen del comprobante de pago es obligatoria.',
            'comprobante.image' => 'El archivo debe ser una imagen.',
            'comprobante.mimes' => 'Formatos de imagen permitidos: jpeg, png, jpg, gif.',
            'comprobante.max' => 'La imagen no debe ser mayor a 4MB.'
        ];

        // Validar los datos
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        #dd($user_id);
        // Encontrar el registro del usuario en el evento
        $EventAttended = EventAttended::where('attendee_id', $user_id)
        ->where('event_id', $event_id)
        ->where('payment_status', 1)
        ->firstOrFail();

        // Actualizar el método de pago y la fecha de pago
        $EventAttended->payment_method = "transferencia";

        // Puedes establecer la fecha de pago como la fecha actual
        $EventAttended->payment_date = now();

       # dd($request->all());
        // Subir el comprobante de pago si se proporcionó
        if ($request->hasFile('comprobante')) {
            $file = $request->file('comprobante');
            $destinationPath = 'argon/comprobantepagosevento/';

            // Verificar si el directorio existe, si no, crearlo
            if (!File::isDirectory($destinationPath)) {
                // Crear el directorio con permisos 0755
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('comprobante')->move($destinationPath, $filename);

            // Verificar si la carga fue exitosa antes de guardar la URL del comprobante
            if ($uploadSuccess) {
                $EventAttended->payment_receipt_url = $destinationPath . $filename;
            } else {
                // Manejar el caso en que la carga del archivo no sea exitosa
                return back()->with('error', 'Hubo un problema al subir el comprobante de pago. Por favor, inténtalo de nuevo.');
            }
        }

        // Guardar los cambios en el registro del usuario en el evento
        $EventAttended->save();

        // Redireccionar con un mensaje de éxito si todo está bien
        return back()->with('success', '¡El comprobante de pago se subió exitosamente!');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
}
