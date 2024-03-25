<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventAttendedController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\TalkController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeWebController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\RallyController;
use App\Http\Controllers\GetBadgeController;
use App\Http\Controllers\GetCertificateController;
use App\Http\Controllers\PublicGeneralController;
use App\Http\Controllers\VideogameController;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/generate-key', function () {
    // Generar y mostrar la nueva clave de la aplicación
    Artisan::call('key:generate', ['--show' => true]);

    // Limpiar la configuración cacheada
    Artisan::call('config:cache');

    // Limpiar la cache
    Artisan::call('cache:clear');

    // Limpiar las vistas cacheadas
    Artisan::call('view:clear');

    // Limpiar las rutas cacheadas
    Artisan::call('route:clear');

    return "Nueva clave de aplicación generada.";
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('auth:clear-resets');
    Artisan::call('optimize:clear');

    return "Cache, configuraci贸n, rutas, vistas y autenticaci贸n limpiadas.";
});

Route::get('/',[HomeWebController::class, 'index'])->name('home_page_index');
Route::get('/events',[HomeWebController::class, 'events'])->name('home_page_events');
Route::get('/event/{slug}', [HomeWebController::class, 'event_detail'])->name('home_page_event_detail');
Route::get('/event/enrroll/{event_id}/{user_id}', [EventAttendedController::class, 'enrroll_to_event'])->name('enrroll_to_event');
Route::get('/event/show/badge/{event_id}/{user_id}', [EventAttendedController::class, 'view_badge_event'])->name('view_badge_event');
Route::get('/event/show/form/payment/{event_id}/{user_id}', [EventAttendedController::class, 'event_payment_form'])->name('event_payment_form');
Route::post('/event/upload/form/payment/{event_id}/{user_id}', [EventAttendedController::class, 'event_upload_payment_form'])->name('event_upload_payment_form');




Route::get('/calendar',[HomeWebController::class, 'calendar'])->name('home_page_calendar');

Route::prefix('web')->group(function () {
    // Route::get('/index',[HomeWebController::class, 'index'])->name('home_page_index');


    Route::get('/sponsor',[HomeWebController::class, 'sponsor'])->name('home_page_sponsor');
    Route::get('/courses/index',[HomeWebController::class, 'course'])->name('home_page_course');
    Route::get('/course/interface/{course_id}', [HomeWebController::class, "CourseInterface"])->name('course_interface');
    Route::get('/speaker/interface/{user_id}', [HomeWebController::class, "SpeakerInterface"])->name('speaker_interface');
    Route::get('/conference/index',[HomeWebController::class, 'conference'])->name('home_page_conference');
    Route::get('/conference/interface/{talk_id}',[HomeWebController::class, 'ConferenceInterface'])->name('conference_interface');
    Route::get('/souvenir',[HomeWebController::class, 'souvenir'])->name('home_page_souvenir');
    Route::get('/login',[HomeWebController::class, 'login'])->name('home_page_login');
    Route::get('/create',[HomeWebController::class, 'create'])->name('home_page_create');
    Route::get('/really',[HomeWebController::class, 'really'])->name('really_index');
    Route::get('/timeline',[HomeWebController::class, 'timeline'])->name('timeline_index');
    Route::get('/timeline2',[HomeWebController::class, 'timeline2'])->name('timeline_index2');
    Route::post('/student/register',[HomeWebController::class, 'createStudent'])->name('student_register');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

        //logbook start-----------------------------------------------
        Route::get('/logbook', [LogbookController::class, "index"])->name('logbook_index');


        // logbook end--------------------------------

        // users start-------------------------------------------
        Route::get('/users', [UserController::class, "index_all"])->name('users_all_index');
        Route::get('/users/create', [UserController::class, "create"])->name('user_create');
        Route::post('/users/store', [UserController::class, "store"])->name('user_store');
        Route::get('/users/update/{user_id}', [UserController::class, "update"])->name('user_update');


        // users end--------------------------------------------

        // student start-------------------------------------------
        Route::get('/student', [StudentController::class, "index"])->name('student_index');
        Route::get('/student/create', [StudentController::class, "create"])->name('student_create');
        Route::post('/student/store', [StudentController::class, "store"])->name('student_store');
        Route::get('/student/update/{student_id}', [StudentController::class, "update"])->name('student_update');
        Route::post('/student/edit', [StudentController::class, "edit"])->name('student_edit');
        Route::post('/student/delete/{user_id}', [StudentController::class, "delete"])->name('student_delete');
        // student end--------------------------------------------

        // public g start-------------------------------------------
        Route::prefix('public_general')->group(function () {
            Route::get('/', [PublicGeneralController::class, 'index'])->name('publicg_index');
            Route::get('/create', [PublicGeneralController::class, 'create'])->name('publicg_create');
            Route::post('/store', [PublicGeneralController::class, 'store'])->name('publicg_store');
            Route::get('/edit/{id}', [PublicGeneralController::class, 'edit'])->name('publicg_edit');
            Route::put('/update/{id}', [PublicGeneralController::class, 'update'])->name('publicg_update');
            Route::post('/delete/{id}', [PublicGeneralController::class, 'delete'])->name('publicg_delete');
        });

        // public g end--------------------------------------------

        //star get badge
        Route::get('/badge', [GetBadgeController::class, "index"])->name('badge_index');
        Route::get('/badge/pdf', [GetBadgeController::class, "pdf"])->name('gafet_pdf');
        //end get badge

        //start certificate
        Route::get('/certificate', [GetCertificateController::class, "index"])->name('certificate_index');
        Route::get('/certificate/pdf', [GetCertificateController::class, "pdf"])->name('certificate_pdf');

        //end certificate


         // Example start------------------------------------------
         Route::get('/example',[ExampleController::class,"index"])->name('example_index');

         //Example end---------------------------------------------

         // password start-------------------------------------------
         Route::get('/password/update/{user_id}',[PasswordController::class,"update"])->name('password_update');
         Route::post('/password/edit',[PasswordController::class,"edit"])->name('password_edit');

        // password start-------------------------------------------
        Route::get('/password/update/{speaker_id}', [PasswordController::class, "update"])->name('password_update');
        Route::post('/password/edit', [PasswordController::class, "edit"])->name('password_edit');

        // password end--------------------------------------------

        // speaker start-------------------------------------------
        Route::get('/speaker', [SpeakerController::class, "index"])->name('speaker_index');
        Route::get('/speaker/create', [SpeakerController::class, "create"])->name('speaker_create');
        Route::post('/speaker/store', [SpeakerController::class, "store"])->name('speaker_store');
        Route::get('/speaker/update/{speaker_id}', [SpeakerController::class, "update"])->name('speaker_update');
        Route::post('/speaker/edit', [SpeakerController::class, "edit"])->name('speaker_edit');
        Route::post('/speaker/delete/{user_id}', [SpeakerController::class, "delete"])->name('speaker_delete');

        // speaker end--------------------------------------------

        // payment start--------------------------------------------

        Route::get('/payments', [PaymentController::class, "index"])->name('payment_index');
        Route::post('/payments/cancel/{payment_id}', [PaymentController::class, "payment_cancel"])->name('payment_cancel');
        Route::post('/payments/aprove/{payment_id}', [PaymentController::class, "payment_aprove"])->name('payment_aprove');
        Route::post('/payments/required', [PaymentController::class, "paymenstRequest"])->name('paymentRequest');


        // payment end--------------------------------------------

        // setting start--------------------------------------------

        Route::get('/setting', [SettingController::class, "index"])->name('setting_index');
        Route::get('/setting/update/{setting_id}', [SettingController::class, "update"])->name('setting_update');
        Route::post('/setting/edit', [SettingController::class, "edit"])->name('setting_edit');

        // setting end--------------------------------------------





        // menu start---------------------------------------
        Route::get('/menu', [MenuController::class, "index"])->name('menu_index');
        Route::get('/menu/create', [MenuController::class, "create"])->name('menu_create');
        Route::post('/menu/store', [MenuController::class, "store"])->name('menu_store');

        // menu end----------------------------------------

        //role start-------------------------------------------
        Route::get('/role', [RoleController::class, "index"])->name('role_index');
        Route::get('/role/create', [RoleController::class, "create"])->name('role_create');
        Route::post('/role/store', [RoleController::class, "store"])->name('role_store');
        Route::get('/role/assign/{role_id}', [RoleController::class, "assign"])->name('role_assign');
        Route::post('/role/assign_permission/', [RoleController::class, "assign_permission"])->name('role_assign_permission');

        // role end---------------------------------------------

        // courses start-----------------------------------
        Route::get('/course', [CourseController::class, "index"])->name('course_index');
        Route::get('/course/create', [CourseController::class, "create"])->name('course_create');
        Route::post('/course/store', [CourseController::class, "store"])->name('course_store');
        Route::get('/course/update/{course_id}', [CourseController::class, "update"])->name('course_update');
        Route::post('/course/edit', [CourseController::class, "edit"])->name('course_edit');
        Route::post('/course/delete/{course_id}', [CourseController::class, "delete"])->name('course_delete');
        Route::post('/course/required', [CourseController::class, "course_enroll_me"])->name('course_enroll');
        // Route::post('/course/enrol/{course_id}', [CourseController::class, "delete"])->name('course_delete');
        // Route::post('/course/enrol/{course_id}', [CourseController::class, "delete"])->name('course_delete');


        //courses end-----------------------

        // souvenirs start---------------------
        Route::get('/souvenir', [SouvenirController::class, "index"])->name('souvenir_index');
        Route::get('/souvenir/create', [SouvenirController::class, "create"])->name('souvenir_create');
        Route::post('/souvenir/store', [SouvenirController::class, "store"])->name('souvenir_store');
        Route::get('/souvenir/update/{souvenir_id}', [SouvenirController::class, "update"])->name('souvenir_update');
        Route::post('/souvenir/edit', [SouvenirController::class, "edit"])->name('souvenir_edit');
        Route::post('/souvenir/delete/{souvenir_id}', [SouvenirController::class, "delete"])->name('souvenir_delete');
        // souvenirs end-----------------------

        // sponsor start ----------------------------------------------
        Route::get('/sponsor', [SponsorController::class, "index"])->name('sponsor_index');
        Route::get('/sponsor/create', [SponsorController::class, "create"])->name('sponsor_create');
        Route::post('/sponsor/store', [SponsorController::class, "store"])->name('sponsor_store');
        Route::get('/sponsor/update/{sponsor_id}', [SponsorController::class, "update"])->name('sponsor_update');
        Route::post('/sponsor/edit', [SponsorController::class, "edit"])->name('sponsor_edit');
        Route::post('/sponsor/delete/{sponsor_id}', [SponsorController::class, "delete"])->name('sponsor_delete');
        //sponsor end---------------------------------------------------

        //package start------------------------------------------------
        Route::get('/package', [PackageController::class, "index"])->name('package_index');
        Route::get('/package/create', [PackageController::class, "create"])->name('package_create');
        Route::post('/package/store', [PackageController::class, "store"])->name('package_store');
        Route::get('/package/update/{package_id}', [PackageController::class, "update"])->name('package_update');
        Route::post('/package/edit', [PackageController::class, "edit"])->name('package_edit');
        Route::post('/package/delete/{package_id}', [PackageController::class, "delete"])->name('package_delete');
        //package end---------------------------------------------------

        ///speaker start-----------------------------------------------

        //speaker end----------------------------------------------------


        ///talk start------------------------------------------------------
        Route::get('/talk', [TalkController::class, "index"])->name('talk_index');
        Route::get('/talk/create', [TalkController::class, "create"])->name('talk_create');
        Route::post('/talk/store', [TalkController::class, "store"])->name('talk_store');
        Route::get('/talk/update/{talk_id}', [TalkController::class, "update"])->name('talk_update');
        Route::post('/talk/edit', [TalkController::class, "edit"])->name('talk_edit');
        Route::post('/talk/delete/{course_id}', [TalkController::class, "delete"])->name('talk_delete');

        //talk end--------------------------------------------------------

        //studen start-------------------------------------------------


        //studen end---------------------------------------------------

        //rally start------------------------------------------------
        Route::get('/rally', [RallyController::class, "index"])->name('rally_index');
        Route::get('/rally/create', [RallyController::class, "create"])->name('rally_create');
        Route::post('/rally/store', [RallyController::class, "store"])->name('rally_store');
        Route::get('/rally/update/{rally_id}', [RallyController::class, "update"])->name('rally_update');
        Route::post('/rally/edit', [RallyController::class, "edit"])->name('rally_edit');
        Route::post('/rally/delete/{rally_id}', [RallyController::class, "delete"])->name('rally_delete');
        //rally end---------------------------------------------------

        Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
        Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);



        // video  game start
        Route::get('/video-game-freedomday', [VideogameController::class, "index"])->name('game_index');



        // LERMA PROJECT INICIO
            // sponsor start ----------------------------------------------
            Route::prefix('event')->group(function () {
                Route::get('/', [EventController::class, 'index'])->name('event_index');
                Route::get('/create', [EventController::class, 'create'])->name('event_create');
                Route::post('/store', [EventController::class, 'store'])->name('event_store');
                Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event_edit');
                Route::put('/update/{id}', [EventController::class, 'update'])->name('event_update');
                Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event_edit');
                Route::get('/event_user_index/{event_id}', [EventAttendedController::class, 'event_user_index'])->name('event_user_index');

                Route::put('/approve-payment/{event_id}/{user_id}', [EventAttendedController::class, 'change_payment_status_form'])->name('change_payment_status_form');




                Route::delete('/delete/{id}', [EventController::class, 'delete'])->name('event_delete');
            });
            //sponsor end---------------------------------------------------

        // LERMA PROJECT FIN


        ///video game end
        /*
        Route::get('upgrade', function () {
            return view('pages.upgrade');
        })->name('upgrade');
        Route::get('map', function () {
            return view('pages.maps');
        })->name('map');
        Route::get('icons', function () {
            return view('pages.icons');
        })->name('icons');
        Route::get('table-list', function () {
            return view('pages.tables');
        })->name('table');
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);*/
    });
});
