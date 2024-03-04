@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">



        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->

              <div class="card-header border-0">
                <h2 class="mb-0">Nuevo usuario</h2>

              </div>


                        <form class="m-5"  action="{{route('user_store')}}"  method="POST">
                            @csrf
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if ($errors->any())

                                        @foreach ($errors->all() as $error)


                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ $error }}                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        @endforeach
                           @endif
                            <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{   old('name') }}" placeholder="Nombre de usuario"  max="50" required oninput="uppercaseLetters(event);">
                            </div>

                            <div class="form-group">
                                <label for="first_surname">Apellido de parterno</label>
                                <input type="text" class="form-control form-control-lg" id="first_surname" name="first_surname" value="{{ old('first_surname') }}" placeholder="Apellido paterno de usuario"  max="50" required  oninput="uppercaseLetters(event);">
                            </div>
                            <div class="form-group">
                                <label for="second_surname">Apellido de materno</label>
                                <input type="text" class="form-control form-control-lg" id="second_surname" name="second_surname" value="{{ old('second_surname') }}" placeholder="Apellido materno de usuario"  max="50"  required oninput="uppercaseLetters(event);">
                            </div>



                            <div class="form-group">
                                <label for="name">Rol</label>

                                <select class="form-control form-control-lg  single-select-2  " data-toggle="select2" id="role_id" name="role_id" >
                                    <option value="-1" selected>Seleccionar</option>
                                    @foreach ($rol_available as $rol )
                                    <option value="{{ $rol->id }}" selected>{{ $rol->name }}</option>

                                    @endforeach



                                  </select>
                            </div>
                            {{-- <div class="form-group">
                                <div class="select" id="select">
                                    <div class="contenido-select">

                                        <label class="titulo">Seleccione un rol</label>
                                    </div>
                                    <i class="fas fa-angle-down"></i>
                                </div>

                                <div class="opciones" id="opciones">
                                    @foreach ($rol_available as $rol )
                                    <a href="#" class="opcion">
                                        <div class="contenido-opcion">
                                            <img src="" alt="image_rol">
                                            <div class="textos">
                                                <h1 class="titulo">{{ $rol->name }}</h1>
                                                <p class="descripcion">{{ $rol->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>


                            </div> --}}
                            <input type="hidden" name="pais" id="inputSelect" value="">


                            <div class="form-group">
                                <label for="gender">Genero</label>

                                <select class="form-control form-control-lg single-select-2" data-toggle="select2" id="gender" name="gender">
                                    <option value="-1" {{ old('gender') == '-1' ? 'selected' : '' }}>Seleccionar</option>
                                    <option value="H" {{ old('gender') == 'H' ? 'selected' : '' }}>Masculino</option>
                                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Femenino</option>
                                    <option value="N/A" {{ old('gender') == 'N/A' ? 'selected' : '' }}>No binario</option>
                                </select>

                            </div>


                            <div class="form-group">
                                <label for="email">Correo electronico</label>
                                <input  type="email" class="form-control form-control-lg" id="email" name="email" value=" {{ old('email') }}" placeholder="Correo electronico del usuario." required maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Contraseña para este usuario." required maxlength="50">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirmar la contraseña para este usuario." required maxlength="50" oninput="checkPasswordMatch()">
                                <div id="passwordMatchError" class="text-danger" style="display: none;">Las contraseñas no coinciden</div>
                            </div>





                            <div class="row  mt-5 d-flex justify-content-center">
                                <div class="col-lg-4 col-12">
                                    <a href="{{  url()->previous()  }}" type="button" class="btn btn-danger">Cancelar</a>

                                </div>
                                <div class="form-group row d-flex justify-content-center">
                                    <button type="submit" class="btn btn-default">Agregar</button>

                                </div>
                            </div>



                        </form>




            </div>
          </div>
        </div>


        @include('layouts.footers.auth')
    </div>


    @endsection

@push('js')

    <script src="/assets/js/ourownselect.js"></script>

    <script src="/assets/js/select2.js"></script>
    <script>
        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
            var passwordMatchError = document.getElementById("passwordMatchError");

            if (password != confirmPassword) {
                passwordMatchError.style.display = "block";
            } else {
                passwordMatchError.style.display = "none";
            }
        }
    </script>

    <script src="/assets/js/validations/generalFunctions.js"></script>

@endpush
