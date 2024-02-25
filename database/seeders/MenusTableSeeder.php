<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('menus')->insert([
            'title' => 'Complementos',
            'description' => 'Contiene las configuraciones grandes',
            'menu_parent' => 0,
            'order' => 1,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Roles',
            'description' => 'Roles',
            'menu_parent' => 1,
            'order' => 2,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Menus',
            'description' => 'Menus',
            'menu_parent' => 1,
            'order' => 3,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Usuarios',
            'description' => 'Usuarios',
            'menu_parent' => 1,
            'order' => 4,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Configuración general',
            'description' => 'Configuración de logo, titulo de la página y etc.',
            'menu_parent' => 1,
            'order' => 5,
            'status' =>2,


        ]);

        DB::table('menus')->insert([
            'title' => 'Bitácora',
            'description' => 'Registra la actividad de los usuarios.',
            'menu_parent' => 1,
            'order' => 6,
            'status' =>2,

        ]);




        ///menu padre  incio
            DB::table('menus')->insert([
            'title' => 'Configuración de la página ',
            'description' => 'Configuración visual de la página -cronograma,temporizador. --menu padre',
            'menu_parent' => 0,
            'order' => 7,
            'status' =>2,

            ]);


            DB::table('menus')->insert([
                'title' => 'Relog de cuenta regresiva',
                'description' => 'Agregar,editar relog de cuenta regresiva de la página.',
                'menu_parent' => 7,
                'order' => 8,
                'status' =>2,

            ]);





            DB::table('menus')->insert([
                'title' => 'Cronograma',
                'description' => 'Modificar el cronograma',
                'menu_parent' => 7,
                'order' => 9,
                'status' =>2,

            ]);

        ///menu fin



        //menu padre
        DB::table('menus')->insert([
            'title' => 'Evento',
            'description' => 'Evento menu padre',
            'menu_parent' => 0,
            'order' => 10,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Estadístitcas del evento',
            'description' => 'Datos importantes acerca de los eventos.',
            'menu_parent' => 10,
            'order' => 11,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Modificar evento',
            'description' => 'Editar,modificar,cancelar y borrar los eventos.',
            'menu_parent' => 10,
            'order' => 12,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Inscribirme a un evento',
            'description' => 'Incribirse a un evento',
            'menu_parent' => 10,
            'order' => 13,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Inscribirme un usuario a un evento',
            'description' => 'Incribirse a un usuario a un evento',
            'menu_parent' => 10,
            'order' => 14,
            'status' =>2,

        ]);

        //menu padre fin

        ///menu padre incio
        DB::table('menus')->insert([
            'title' => 'Conferencistas',
            'description' => '  Menu padre.',
            'menu_parent' => 0,
            'order' => 15,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Modificar conferencista',
            'description' => 'Editar,borrar o suspender conferencista.',
            'menu_parent' => 15,
            'order' => 16,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Ver conferencistas',
            'description' => 'Editar,borrar o suspender conferencista.',
            'menu_parent' => 15,
            'order' => 17,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Registrar conferencistas',
            'description' => 'Editar,borrar o suspender conferencista.',
            'menu_parent' => 15,
            'order' => 18,
            'status' =>2,

        ]);



        ///menu padre incio

        DB::table('menus')->insert([
            'title' => 'Souvenirs',
            'description' => 'Menu padre.',
            'menu_parent' => 0,
            'order' => 19,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Ver todos los souvenir',
            'description' => 'Agregar,editar o borrar suvenir.',
            'menu_parent' => 19,
            'order' => 20,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Comprar /Solicitar souvenir',
            'description' => 'Comprar souvenir.',
            'menu_parent' => 19,
            'order' => 21,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Modificar souvenir',
            'description' => 'Agregar,editar o borrar suvenir.',
            'menu_parent' => 19,
            'order' => 22,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Estadisticas de souvenir',
            'description' => 'Agregar,editar o borrar suvenir.',
            'menu_parent' => 19,
            'order' => 23,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Cobrar souvenir',
            'description' => 'Agregar,editar o borrar suvenir.',
            'menu_parent' => 19,
            'order' => 24,
            'status' =>2,

        ]);
        ///menu padre fin


        //menu padre
        DB::table('menus')->insert([
            'title' => 'Alumnos',
            'description' => 'Menu padre.',
            'menu_parent' => 0,
            'order' => 25,
            'status' =>2,

        ]);
        DB::table('menus')->insert([
            'title' => 'Modificar alumnos',
            'description' => 'Agregar,editar o borrar alumno.',
            'menu_parent' => 25,
            'order' => 26,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Ver todos alumnos',
            'description' => 'Agregar,editar o borrar suvenir.',
            'menu_parent' => 25,
            'order' => 27,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Estadisticas alumnos',
            'description' => 'Agregar,editar o borrar suvenir.',
            'menu_parent' => 25,
            'order' => 28,
            'status' =>2,

        ]);

        //menu padre
        DB::table('menus')->insert([
            'title' => 'Empresas',
            'description' => 'Menu padre .',
            'menu_parent' => 0,
            'order' => 29,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Modificar empresas',
            'description' => 'Agregar,editar o borrar empresas.',
            'menu_parent' => 29,
            'order' => 30,
            'status' =>2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Ver todos las empresas',
            'description' => 'Ver todos los empresas.',
            'menu_parent' => 29,
            'order' => 31,
            'status' =>2,

        ]);

        //menu fin

         //menu padre
         DB::table('menus')->insert([
             'title' => 'Paquetes',
             'description' => 'Menu padre .',
             'menu_parent' => 0,
             'order' => 32,
             'status' =>2,

         ]);

         DB::table('menus')->insert([
             'title' => 'Modificar paquetes',
             'description' => 'Agregar,editar o borrar paquetes.',
             'menu_parent' => 32,
             'order' => 33,
             'status' => 2,

         ]);

         DB::table('menus')->insert([
             'title' => 'Ver todos los paquetes',
             'description' => 'Ver todos los paquetes.',
             'menu_parent' => 32,
             'order' => 34,
             'status' => 2,

         ]);

        //menu fin

        //menu padre
         DB::table('menus')->insert([
            'title' => 'Actualizar contraseña',
            'description' => 'Ver todos los paquetes.',
            'menu_parent' => 1,
            'order' => 35,
            'status' => 2,

         ]);

         //menu fin

         //menu padre
         DB::table('menus')->insert([
            'title' => 'Perfil',
            'description' => 'Menu Padre',
            'menu_parent' => 36,
            'order' => 36,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Información de Perfil',
            'description' => 'Ver toda la información del perfil',
            'menu_parent' => 36,
            'order' => 37,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Actualizar información',
            'description' => 'Actualizar toda la información del perfil',
            'menu_parent' => 36,
            'order' => 38,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Actualizar contraseña',
            'description' => 'Actualizar la contraseña del perfil',
            'menu_parent' => 36,
            'order' => 39,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Actualizar foto ',
            'description' => 'Actualizar la foto de perfil',
            'menu_parent' => 36,
            'order' => 40,
            'status' => 2,

        ]);

        //menu fin

        //menu padre

        DB::table('menus')->insert([
            'title' => 'Estudiante',
            'description' => 'Menu padre',
            'menu_parent' => 41,
            'order' => 41,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Elegir paquete',
            'description' => 'Poder adquirir un paquete',
            'menu_parent' => 41,
            'order' => 42,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Elegir Evento',
            'description' => 'Poder registrarse en un evento',
            'menu_parent' => 41,
            'order' => 43,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Obtener gafet',
            'description' => 'Poder adquirir un gafet del evento',
            'menu_parent' => 41,
            'order' => 44,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Vista de conferencias',
            'description' => 'Visualizar las conferencias como  usuario',
            'menu_parent' => 41,
            'order' => 45,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Vista de evento',
            'description' => 'Visualizar los evento como  usuario',
            'menu_parent' => 41,
            'order' => 46,
            'status' => 2,

        ]);

        //menu fin

        //menu padre

        DB::table('menus')->insert([
            'title' => 'Pagos',
            'description' => 'Menu Padre',
            'menu_parent' => 47,
            'order' => 47,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'modificar pago',
            'description' => 'Aprobar, cancelar, borrar, pagos de los paquetes',
            'menu_parent' => 47,
            'order' => 48,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Confirmar Pago',
            'description' => 'Confirma que el usuario tenga un pago aprobado en la entrada',
            'menu_parent' => 47,
            'order' => 49,
            'status' => 2,

        ]);

        //menu fin

        //menu padre

        DB::table('menus')->insert([
            'title' => 'Dashboard',
            'description' => 'Menu Padre',
            'menu_parent' => 50,
            'order' => 50,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Dashboard alumno',
            'description' => 'Visualizar todas las vistas del alumno',
            'menu_parent' => 50,
            'order' => 51,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Dashboard admin',
            'description' => 'Visualizar todas las vistas del administrador',
            'menu_parent' => 50,
            'order' => 52,
            'status' => 2,

        ]);

        DB::table('menus')->insert([
            'title' => 'Dashboard conferencista o tallerista',
            'description' => 'Visualizar todas las vistas del conferencista o tallerista',
            'menu_parent' => 50,
            'order' => 53,
            'status' => 2,

        ]);

        //menu fin










        //menu fin

        //  //menu padre
        // DB::table('menus')->insert([
        //     'title' => 'Extranjeros',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);
        // DB::table('menus')->insert([
        //     'title' => 'Modificar extranjero',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);

        // DB::table('menus')->insert([
        //     'title' => 'Ver todos los extranjeros',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);

        // DB::table('menus')->insert([
        //     'title' => 'Estadisticas extranjeros',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);


        // //menu fin



        // //menu padre
        // DB::table('menus')->insert([
        //     'title' => 'Pagos',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);

        // DB::table('menus')->insert([
        //     'title' => 'Ver todos los pagos',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);

        // DB::table('menus')->insert([
        //     'title' => 'Moficar pago',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);

        // DB::table('menus')->insert([
        //     'title' => 'Estadisticas pagos',
        //     'description' => 'Agregar,editar o borrar suvenir.',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);
        // //menu fin


        // //menu padre incio
        // DB::table('menus')->insert([
        //     'title' => 'Ticket o Gafete',
        //     'description' => '',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);

        // DB::table('menus')->insert([
        //     'title' => 'Verificar gafete',
        //     'description' => 'Escaneara el código QR del gafete',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);

        // DB::table('menus')->insert([
        //     'title' => 'Generar mi  gafete',
        //     'description' => 'Escaneara el código QR del gafete',
        //     'menu_parent' => 1,
        //     'order' => 5,
        //     'status' =>2,

        // ]);




        //menu padre fin




    }
}
