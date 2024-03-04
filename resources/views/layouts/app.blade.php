<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config_name_system() }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon/brand') }}/{{ config_icon_logo_system() }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!--DATABLE-->


        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css') }}/modificado.css" rel="stylesheet">


    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: block;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <input type="number" class="form-control form-control-lg" id="order" name="order" placeholder="Menu orden (de acuerdo a la base de datos)" min="0" oninput="validateOrderInput(this)">

        <script>
             function confirmLogout() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Deseas cerrar sesión?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
        function soloInputsEnterosYMayor0(input) {
            // Eliminar caracteres no permitidos
            input.value = input.value.replace(/[^\d]/g, '');

            // Convertir el valor a un número entero
            var valor = parseInt(input.value);

            // Verificar si el valor es un número y si es mayor que cero
            if (isNaN(valor) || valor < 0) {
                input.value = ''; // Si no es un número válido, vaciar el campo
            }
        }
        function validarFechaApartirDeHoy(input) {
            var fechaIngresada = new Date(input.value);
            var fechaActual = new Date();

            // Convertir la fecha actual a formato YYYY-MM-DD para comparación
            var fechaActualFormateada = fechaActual.toISOString().slice(0, 10);

            // Convertir la fecha ingresada a formato YYYY-MM-DD para comparación
            var fechaIngresadaFormateada = fechaIngresada.toISOString().slice(0, 10);

            if (fechaIngresadaFormateada < fechaActualFormateada) {
                alert("La fecha no puede ser anterior a la fecha actual.");
                input.value = ''; // Limpiar el valor del campo de entrada
            }
        }
        function validarNumerosPositivosCostos(input) {
            var regex = /^\d+(\.\d{0,2})?$/;

        // Validar si el valor ingresado coincide con la expresión regular
        if (!regex.test(input.value)) {
            // Si no coincide, mostrar un mensaje de error y volver al valor anterior
            input.value = input.value.slice(0, -1);
        }
        }




        </script>

    </body>
</html>
