@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

@include('users.partials.header', [
'title' => __('¡Hola') . ' '.auth()->user()->name.' '.auth()->user()->first_surname.' !',
'class' => 'col-lg-12'
])


<div class="container-fluid mt--7">
    <div class="row">
        @if(Auth::user()->role_id==4 ||Auth::user()->role_id==5 ||Auth::user()->role_id==6)
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{asset(Auth::user()->user_image)}}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                        <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> --}}
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                @if(Auth::user()->role_id==4)
                                <!-- <div>
                                    <span class="heading">Junior</span>
                                    <span class="description">{{ __('Paquete') }}</span>
                                </div> -->
                                {{-- <div>
                                                <span class="heading">10</span>
                                                <span class="description">{{ __('Photos') }}</span>
                            </div> --}}
                            <!-- <div>
                                <span class="heading">Base de datos</span>
                                <span class="description">{{ __('Curso inscrito') }}</span>
                            </div> -->
                            @endif
                            @if(Auth::user()->role_id==6)
                            <div>
                                <span class="heading">{{__('BASE DE DATOS')}}</span>
                                <span class="description">{{ __('Curso a impartir') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h3>
                        {{ auth()->user()->name }} {{ auth()->user()->first_surname }}
                        {{-- <span class="font-weight-light">, 27</span> --}}
                    </h3>
                    @if(Auth::user()->role_id==4)
                    <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i>{{ auth()->user()->quarter }}

                        <i class="ni location_pin mr-2"></i>{{ auth()->user()->group }}
                    </div>
                    <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->carrers->name }}
                    </div>
                    @endif
                    @if(Auth::user()->role_id==6)
                    <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>Experto en:{{auth()->user()->specialty}}
                    </div>
                    <div>
                        <span class="description">{{ __('Especialidad') }}</span>
                    </div>
                    @endif
                    {{-- <div>
                                        <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                </div> --}}
                {{-- <hr class="my-4" />
                                    <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                <a href="#">{{ __('Show more') }}</a> --}}
            </div>
        </div>
    </div>
</div>
@endif
<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Editar perfil') }}</h3>
                <h3 class="mb-0">{{ $Foto }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" autocomplete="off">
                @csrf
                @method('put')

                <h6 class="heading-small text-muted mb-4">{{ __('Información personal') }}</h6>

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif


                <div class="pl-lg-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                        <input type="text" name="name" oninput="uppercaseLetters(event);" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus oninput="uppercaseLetters(event);">

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('first_surname') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Apellido paterno') }}</label>
                        <input type="text" name="first_surname" id="input-first_surname" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido paterno') }}" value="{{ old('first_surname', auth()->user()->first_surname) }}" required autofocus oninput="uppercaseLetters(event);">

                        @if ($errors->has('first_surname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_surname') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('second_surname') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Apellido materno') }}</label>
                        <input type="text" name="second_surname" id="input-second_surname" class="form-control form-control-alternative{{ $errors->has('second_surname') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido materno') }}" value="{{ old('second_surname', auth()->user()->second_surname) }}" required autofocus oninput="uppercaseLetters(event);">

                        @if ($errors->has('second_surname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('second_surname') }}</strong>
                        </span>
                        @endif
                    </div>

                    @switch(Auth::user()->role_id)

                    @case(1)

                    
                    <div class="form-group">
                        <label for="gender">Genero</label>

                        <select class="form-control form-control-lg single-select-2 " data-toggle="select2" id="gender" name="gender">
                            <option value="-1" selected>Seleccionar</option>
                            <option value="H">Masculino</option>
                            <option value="M">Feminino</option>
                            <option value="N/A">No binario</option>


                        </select>
                    </div>

                    @break

                    @case(4)
                    <div class="form-group">
                        <label for="career">Carrera</label>

                        <select class="form-control form-control-lg  single-select-2" data-toggle="select2" name="career" id="career">
                            <option value="-2" selected>Seleccionar</option>
                            @foreach ($carrers_available as $carrer )
                            <option value="{{ $carrer->id }}">{{ $carrer->name }}</option>

                            @endforeach
                        </select>
                    </div>


                      <div class="form-group">
                        <label for="quarter">Cuatrimestre</label>

                        <select class="form-control form-control-lg  single-select-2" data-toggle="select2" id="quarter" name="quarter">
                            <option value="-3" selected>Seleccionar</option>
                            <option value="first">1° Primero</option>
                            <option value="second">2° Segundo</option>
                            <option value="third">3° Tercero</option>
                            <option value="fourth">4° Cuarto</option>
                            <option value="fifth">5° Quinto</option>
                            <option value="sixth">6° Sexto</option>
                            <option value="seventh">7° Séptimo</option>
                            <option value="eighth">8° Octavo</option>
                            <option value="nineth">9° Noveno</option>
                            <option value="tenth">10° Décimo</option>



                        </select>
                    </div>

                    <div class="form-group">
                        <label for="group">Grupo</label>

                        <select class="form-control form-control-lg  single-select-2" data-toggle="select2" id="group" name="group">
                            <option value="-4" selected>Seleccionar</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>




                        </select>
                    </div>

                    <div class="form-group">
                        <label for="enrollment">Matricula</label>
                        <input type="text" class="form-control form-control-lg" id="enrollment" name="enrollment" value="{{   old('enrollment') }}" placeholder="Cuatrimestre" max="8" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Genero</label>

                        <select class="form-control form-control-lg single-select-2 " data-toggle="select2" id="gender" name="gender">
                            <option value="-1" selected>Seleccionar</option>
                            <option value="H">Masculino</option>
                            <option value="M">Feminino</option>
                            <option value="N/A">No binario</option>


                        </select>
                    </div>



                    @break

                    @case(5)
                    <div class="form-group">
                        <label for="enrollment">Matricula</label>
                        <input type="text" class="form-control form-control-lg" id="enrollment" name="enrollment" value="{{   old('enrollment') }}" placeholder="Cuatrimestre" max="8" required>
                    </div>

                    @break



                    @case(6)

                    <div class="form-group">
                        <label for="academic_level">Nivel Academico</label>
                        <input type="text" class="form-control form-control-lg" id="academic_level" name="academic_level" value="{{ old('academic_level') }}" placeholder="Nivel Academico" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="form-group">
                        <label for="description">Requisitos para impartir el curso</label>
                        <input type="file"   class="form-control form-control-lg" accept="application/pdf" id="description" name="description" value="{{ old('description') }}" placeholder=" " max="50" required>
                    </div>


                    <div class="form-group">
                        <label for="speaker_cv">Curriculum Viate del Conferencista/Tallerista</label>
                        <input type="file" onBlur='LimitAttach1(this,1)' accept="application/pdf" class="form-control form-control-lg" id="speaker_cv" name="speaker_cv" value="{{ old('gender') }}" placeholder=" " max="50" required>
                    </div>

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
                        <label for="specialty">Especialidad </label>
                        <input type="text" class="form-control form-control-lg" id="specialty" name="specialty" value="{{   old('specialty') }}" placeholder="Especialidad" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    @break



                    @default



                    @endswitch



                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Correo electronico') }}</label>
                        <input type="email" name="email" id="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div id="ocultardiv" class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                        <label class="form-control-label"  for="user_image">{{ __('foto de perfil') }}</label>
                        <input type="file" accept="image/*"  onBlur='LimitAttach1(this,2)' name="user_image" id="user_image" class="form-control form-control-alternative{{ $errors->has(' ') ? ' is-invalid' : '' }}" placeholder="{{ __('user_image') }}" value="{{ old('user_image', auth()->user()->user_image) }}" required>

                        @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                        @endif
                    </div>

                    @if ( check_acces_to_this_permission(Auth::user()->role_id,40))

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar información') }}</button>
                    </div>
                    @endif
                </div>
            </form>
            <hr class="my-4" />
            @if ( check_acces_to_this_permission(Auth::user()->role_id,39))

            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                @csrf
                @method('put')

                <h6 class="heading-small text-muted mb-4">{{ __('Contraseña') }}</h6>

                @if (session('password_status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('password_status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="pl-lg-4">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-current-password">{{ __('Contraseña actual') }}</label>
                        <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña actual') }}" value="" required>

                        @if ($errors->has('old_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-password">{{ __('Nueva contraseña') }}</label>
                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nueva contraseña') }}" value="" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirmar contraseña') }}</label>
                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('confirma la nueva contraseña') }}" value="" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Cambiar contraseña') }}</button>
                    </div>
                </div>
            </form>
            @endif

        </div>
    </div>
</div>
</div>



@include('layouts.footers.auth')



</div>
@endsection

@push('js')
<script src="/assets/js/validations/generalFunctions.js"></script>
<link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
<script src="/assets/vendor/select2/dist/js/select2.min.js" defer></script>







@endpush