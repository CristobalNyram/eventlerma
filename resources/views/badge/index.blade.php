@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')
<link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_Gafet.css">

<div class="container-fluid mt--6">
    <div class="row d-flex mb-3 mr-5 justify-content-end">
        @if ( check_acces_to_this_permission(Auth::user()->role_id,33))

        <a href="{{ route('gafet_pdf') }}" type="button" class="btn btn-info">Descargar Gafet</a>
        @endif

        <script type="text/javascript">
            // $(document).ready(function() {
            // alert("Ya cargue");
            let contador = 0;

            function prueba() {
                alert("Funcion");
            }

            function mostrarFrase() {

                let frases = document.querySelectorAll(".frase");
                //  console.log(frases);
                for (let index = 0; index < frases.length; index++) {
                    const element = frases[index];
                    if (contador == index) {
                        element.style.display = "block";
                        // console.log(element);
                        console.log(index);
                        console.log(contador);

                        if (contador == frases.length) {
                            contador = 0;
                        }

                    } else {
                        element.style.display = "none";
                        if (contador == frases.length) {
                            contador = 0;
                        }
                    }

                    // arreglo =["maria" "jose"]

                    //print(arreglo[0])

                }
                contador += 1;
            }
            // });
        </script>
        <!-- <a id="boton" onclick="mostrarFrase();" class="btn btn-info">Generar Frase Descriptiva</a> -->

    </div>

    <div class="card">


        <div class="card-body pt-2">
            <div class="gafet">
                <img id="bloque" src="https://i.ibb.co/WxVP3sH/ci-4.png">
                <img id="ri2" src="https://i.ibb.co/SBqY7YT/ri-2.png">
                <img id="perfil" src="{{old('user_image', auth()->user()->user_image)}}">
                <img id="logo" src="https://i.ibb.co/87XSQ16/ri-5.png">
                <img id="ri3" src="https://i.ibb.co/qp7W9gt/ri-3.png">

                <div class="NombreUsuario">
                    <h1>{{ old('name', auth()->user()->name) }}</h1>
                </div>



                <h2 id="apellidos">{{ old('first_surname', auth()->user()->first_surname) }} {{ old('second_surname', auth()->user()->second_surname) }}</h2>
                @foreach($consulta as $rol)
                <h3 id="roles">{{$rol->name}}</h3>
                @endforeach
                <h4 id="CODERS">CODERSTI</h4>
                <h4 id="frase">#HAZLODIFERENTE</h4>

                <!-- <div class="texto" id="texto">
                    <label class="frase" id="Frase1" style="display: none;">"El no querer es la causa, el no poder el pretexto"</label>
                    <label class="frase" id="Frase2" style="display: none;">"El ordenador nació para resolver problemas que antes no existían"</label>
                    <label class="frase" id="Frase3" style="display: none;">"El optimismo es un riesgo laboral de la programación; el feedback es el tratamiento"</label>
                    <label class="frase" id="Frase4" style="display: none;">"No temo a los ordenadores; lo que temo es quedarme sin ellos"</label>
                    <label class="frase" id="Frase5" style="display: none;">"Los ordenadores son buenos siguiendo instrucciones, no leyendo tu mente"</label>
                    <label class="frase" id="Frase6" style="display: none;">"Antes de que un software sea reutilizable debería ser utilizable"</label>
                    <label class="frase" id="Frase7" style="display: none;">"Una vez un ordenador me venció jugando al ajedrez, pero no me opuso resistencia cuando pasamos al kick boxing"</label>
                </div> -->

            </div>




        </div>
    </div>




    @include('layouts.footers.auth')
</div>




<script>
    $(document).ready(function() {
        $('#table_users_all').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No encontramos nada.",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros existentes.",
                "infoFiltered": "(Fitrado de _MAX_  registros existentes)",
                "loadingRecords": "Cargando...",
                "search": "Buscar:",
                "emptyTable": "No hay información disponible en la tabla.",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                },
            }
        });
    });
</script>

@endsection

@push('js')
{{-- <script src="{{ asset() }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script> --}}



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





@endpush