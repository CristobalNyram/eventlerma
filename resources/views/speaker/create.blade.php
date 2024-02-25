@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Nuevo Conferencista</h2>

                </div>


                <form class="m-5" action="{{route('speaker_store')}}" method="POST" enctype="multipart/form-data">
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
                        {{ $error }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endforeach
                    @endif
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{   old('name') }}" placeholder="Nombre" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="form-group">
                        <label for="first_surname">Apellido parterno</label>
                        <input type="text" class="form-control form-control-lg" id="first_surname" name="first_surname" value="{{ old('first_surname') }}" placeholder="Apellido paterno" max="50" required oninput="uppercaseLetters(event);">
                    </div>
                    <div class="form-group">
                        <label for="second_surname">Apellido materno</label>
                        <input type="text" class="form-control form-control-lg" id="second_surname" name="second_surname" value="{{ old('second_surname') }}" placeholder="Apellido materno" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    

                    <div class="form-group">
                        <label for="speaker_cv">Curriculum Vitae</label>
                        <input type="file" onBlur="LimitAttach1(this,1)" accept="application/pdf" class="form-control form-control-lg" id="speaker_cv" name="speaker_cv" value="{{ old('speaker_cv') }}" placeholder="Curriculum Vitae" max="50" required>
                    </div>

                    <script type="text/javascript">
                        function LimitAttach1(tField, iType) {
                            file = tField.value;
                            if (iType == 1) {
                                extArray = new Array(".pdf");
                            }
                            allowSubmit = false;
                            if (!file) return;
                            while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
                            ext = file.slice(file.indexOf(".")).toLowerCase();
                            for (var i = 0; i < extArray.length; i++) {
                                if (extArray[i] == ext) {
                                    allowSubmit = true;
                                    break;
                                }
                            }
                            if (allowSubmit) {} else {
                                tField.value = "";
                                alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")));
                            }
                        }
                    </script>

                   



                    <input type="hidden" class="form-control form-control-lg" id="role_id" name="role_id" value="6" placeholder="Rol del conferencista" max="50" required oninput="uppercaseLetters(event);">





                    <div class="form-group">
                        <label for="gender">Genero</label>

                        <select class="form-control form-control-lg  " data-toggle="select2" id="gender" name="gender">
                            <option value="-1" selected>Seleccionar</option>
                            <option value="H">Masculino</option>
                            <option value="M">Feminino</option>
                            <option value="N/A">No binario</option>


                        </select>
                    </div>


                    <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" value=" {{ old('email') }}" placeholder="Correo electronico." required maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" value="{{ old('password') }}" name="password" placeholder="Crear Contraseña." required maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input type="password" class="form-control form-control-lg" id=" password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña ." required maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="user_image">Foto del Conferencista</label>
                        <input type="file" onBlur='LimitAttach(this,1)' ; accept="image/*" class="form-control form-control-lg" id="user_image" name="user_image" value="{{ old('user_image') }}" placeholder="Foto del Conferencista" max="50" required>
                    </div>

                    <div class="alert alert-warning alert-dismissible fade show" id="alerta" role="alert" style="display: none" role="alert">
                        <span class="alert-inner--text"><strong>Advertencia: </strong> Sólo se aceptan archivos con extensiones .jpeg, .jpe, .jpg, .png</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
<script src="/assets/js/validations/generalFunctions.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush