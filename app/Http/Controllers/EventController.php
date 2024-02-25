<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Logbook;
use App\Models\Place_event;
use App\Models\Relcoursestudent;
use App\Models\Type_event;
use App\Models\Type_public;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\User;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


     public function index()
     {
         $role = New Role();
         $log = new Logbook();

         if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 10) == null) {
             $variables = [
                 'menu' => '',
                 'title_page' => 'No puedes pasar',
             ];
             return view('errors.notaccess')->with($variables);
         }

         $log->activity_done($description = 'Accedió al módulo de eventos.', $table_id = 0, $menu_id = 10, $user_id = Auth::id(), $kind_acction = 1);


         $regs_active=Event::all()->where('status','>','0');
         $regs_active_number=Event::all()->where('status','=','2')->count();



         $variables=[
             'menu'=>'events_all',
             'title_page'=>'Eventos',
             'regs'=>$regs_active,
             'regs_active_number'=> $regs_active_number,



         ];
         return view('admin.event.index')->with($variables);
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

         if ($role->checkAccesToThisFunctionality(Auth::user()->role_id, 12) == null) {
             $variables = [
                 'menu' => '',
                 'title_page' => 'Acceso denegado',
             ];
             return view('errors.notaccess')->with($variables);
         }

         $log->activity_done($description = 'Accedió al módulo de cargar evento.', $table_id = 0, $menu_id = 12, $user_id = Auth::id(), $kind_acction = 1);

         $type_event=Type_event::all()->where('status', '=', '2');
         $type_public=Type_public::all()->where('status', '=', '2');
         $place_event=Place_event::all()->where('status', '=', '2');


         $variables=[
             'menu'=>'events_all',
             'title_page'=>'Evento',
             'type_event'=>$type_event,
             'place_event'=>$place_event,
             'type_public'=>$type_public,

         ];

         return view('admin.event.create')->with($variables);
     }


     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(EventRequest $request)
     {
        try {

            $validatedData=$request->all();
            DB::beginTransaction();

            $event = new Event();
            $event->name = $validatedData['name'];
            $event->slug = $validatedData['slug'];
            $event->description = $validatedData['description'];
            $event->cost = $validatedData['cost'];
            $event->capacity = $validatedData['capacity'];
            $event->time = $validatedData['time'];
            $event->duration = $validatedData['duration'];
            $event->date = $validatedData['date'];
            $event->status = $validatedData['status'];
            $event->type_event_id = $validatedData['type_event_id'];
            $event->place_id = $validatedData['place_events_id'];
            $event->type_public_id = $validatedData['type_public_id'];
            // $event->speaker_id = $validatedData['speaker_id'];

            // Upload de la foto del evento
            if ($request->hasFile('url_photo')) {
                $file = $request->file('url_photo');
                $destinationPath = 'uploads/events/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($destinationPath, $filename);
                $event->url_photo = $destinationPath . $filename;
            }

            $event->save();

            DB::commit();

            // Logbook
            $log = new Logbook();
            $log->activity_done('Agregó el evento ' . $event->name . ' exitosamente', 0, 12, Auth::id(), 6);

            return back()->with('success', 'Se ha registrado el evento exitosamente.');
        } catch (Exception $e) {
            DB::rollBack();

            return back()->withErrors('Ha ocurrido un error al intentar registrar el evento: ' . $e->getMessage());
        }
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Course  $course
      * @return \Illuminate\Http\Response
      */
      public function update(Request $request, $id)
      {
          $event = Event::findOrFail($id);

          $request->validate([
              'name' => 'required|string|max:255',
              'slug' => 'required|string|max:255',
              'description' => 'required|string',
              'capacity' => 'required|integer|min:1',
              'time' => 'required|date_format:H:i',
              'duration' => 'required|string',
              'date' => 'required|date',
              'url_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
              'status' => 'required|in:1,2',
              'type_event_id' => 'required|exists:type_events,id',
              'place_events_id' => 'required|exists:place_events,id',
              'type_public_id' => 'required|exists:type_public,id',
          ]);

          try {
              DB::beginTransaction();

              $event->name = $request->input('name');
              $event->slug = $request->input('slug');
              $event->description = $request->input('description');
              $event->capacity = $request->input('capacity');
              $event->time = $request->input('time');
              $event->duration = $request->input('duration');
              $event->date = $request->input('date');
              $event->status = $request->input('status');
              $event->type_event_id = $request->input('type_event_id');
              $event->place_id = $request->input('place_events_id');
              $event->type_public_id = $request->input('type_public_id');

              // Handle photo upload if provided

              if ($request->hasFile('url_photo')) {
                $file = $request->file('url_photo');
                $destinationPath = 'uploads/events/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($destinationPath, $filename);
                $event->url_photo = $destinationPath . $filename;
            }

              $event->save();

              DB::commit();

              return back()->with('success', 'Evento actualizado exitosamente');
          } catch (\Exception $e) {
              DB::rollback();
              return redirect()->back()->with('error', 'Error al actualizar el evento: ' . $e->getMessage());
          }
      }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Course  $course
      * @return \Illuminate\Http\Response
      */

     public function edit($id)
     {
         $role = New Role();
         $log = new Logbook();

         if($role->checkAccesToThisFunctionality(Auth::user()->role_id,10)==null)
         {
             $variables=[
                 'menu'=>'',
                 'title_page'=>'Acceso denegado',


             ];
             return view('errors.notaccess')->with($variables);

         }

         $log->activity_done($description='Accedió al módulo para actualizar un evento.',$table_id=0,$menu_id=10,$user_id=Auth::id(),$kind_acction=1);

         $type_event=Type_event::all()->where('status', '=', '2');
         $type_public=Type_public::all()->where('status', '=', '2');
         $place_event=Place_event::all()->where('status', '=', '2');
         $reg=Event::findOrFail($id);


         $variables=[
             'menu'=>'events_all',
             'title_page'=>'Evento',
             'type_event'=>$type_event,
             'place_event'=>$place_event,
             'type_public'=>$type_public,
             'reg'=>$reg,


         ];

         return view('admin.event.edit')->with($variables);
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Course  $course
      * @return \Illuminate\Http\Response
      */
      public function delete($id)
      {
          $event = Event::findOrFail($id);
          $event->status = -2; // Marcamos el evento como eliminado, puedes ajustar esto según tu lógica de estado

          $log = new Logbook();

          try {
              if ($event->save()) {
                  $log->activity_done(
                      $description = 'Eliminó el evento ' . $event->name . ' correctamente',
                      $table_id = 0,
                      $menu_id = 10, // Puedes ajustar este valor según tu aplicación
                      $user_id = Auth::id(),
                      $kind_acction = 3
                  );
                  return back()->with('success', 'Se ha eliminado el evento exitosamente...')->with('eliminar', 'ok');
              } else {
                  return back()->with('error', 'No se ha eliminado el evento...');
              }
          } catch (\Exception $e) {
              return back()->with('error', 'Error al eliminar el evento: ' . $e->getMessage());
          }
      }
     public function course_enroll_me(Request $request)
     {
         $log = new Logbook();
         $answer=[];
         $course = Course::findOrFail($request->course_id);
         $count_enrrolles_in_course=Relcoursestudent::all()->where('course_id','=',$request->course_id)->where('status','=',2)->count();
         if($count_enrrolles_in_course>=$course->maximum_person){


             $answer['status']=-1;
             $answer['title']='Aviso';
             $answer['message']='El cupo a este curso a sido completado, intenta inscribirte a otro curso o hablar con un administrador del evento...';
             $course->status_course = "2";
             return $answer;


         }else
         {
             $new_registation_in_course=new Relcoursestudent();
             $new_registation_in_course->course_id=$request->course_id;
             $new_registation_in_course->user_student_id=Auth::id();
             $new_registation_in_course->user_approved_id=Auth::id();


             if($new_registation_in_course->save()){
                 $log->activity_done($description = 'Se incribió a un curso ' . $course->title . ' correctamente', $table_id = 0, $menu_id = 14, $user_id = Auth::id(), $kind_acction = 3);

                 $answer['status']=2;
                 $answer['title']='Éxito';
                 $answer['message']='Te has inscrito correctamente a el curso '.$course->title.'...';
                 return $answer;
             }else{
                 $answer['status']=-2;
                 $answer['title']='Error';
                 $answer['message']='Error al procesar sus datos...';
                 return $answer;
             }


         }

     }
}
