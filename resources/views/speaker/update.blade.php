@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Actualizar información del conferencista: {{ $current_speaker->name }} {{ $current_speaker->first_surname }}</h2>
                </div>

                <form class="m-5" action="{{route('speaker_edit')}}" method="POST">
                    @csrf
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    @if ($errors->any())

                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <strong> {{ $error }}</strong>
                    </div>

                    @endforeach
                    @endif
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="{{$current_speaker->id}}">
                        <label for="name">Nombre del conferencista</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{    $current_speaker->name  }}" placeholder="Nombre" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="form-group">
                        <label for="first_surname">Apellido Paterno</label>
                        <input type="text" class="form-control form-control-lg" id="first_surname" name="first_surname" value="{{ $current_speaker->first_surname }}" placeholder="Apellido paterno " max="50" required oninput="uppercaseLetters(event);">
                    </div>
                    <div class="form-group">
                        <label for="second_surname">Apellido Materno</label>
                        <input type="text" class="form-control form-control-lg" id="second_surname" name="second_surname" value="{{ $current_speaker->second_surname }}" placeholder="Apellido Materno" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="form-group">
                        <label for="role_id"></label>
                        <input type="hidden" class="form-control form-control-lg" id="role_id" name="role_id" value="6" placeholder="Rol del estudiante" max="50" required oninput="uppercaseLetters(event);">
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
                        <label for="email">Correo Electronico</label>
                        <input type="emil" class="form-control form-control-lg" id="email" name="email" value="{{ $current_speaker->email }}" placeholder="correo electronico del estudiante" max="50" required>
                    </div>

                    <div class="form-group">
                        <label for="speaker_cv">Curriculum Vitae</label>
                        <input type="file" class="form-control form-control-lg" id="speaker_cv" name="speaker_cv" accept="application/pdf" value="{{ $current_speaker->speaker_cv }}" placeholder="Curriculum Vitae" max="50" required>
                    </div>

                    <div class="form-group">
                        <label for="user_image">Foto del Conferencista</label>
                        <input type="file" onBlur='LimitAttach(this,1)' ; accept="image/*" class="form-control form-control-lg" id="user_image" name="user_image" value="{{ $current_speaker->user_image}}" placeholder="Foto del Conferencista" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="alert alert-warning alert-dismissible fade show" id="alerta" role="alert" style="display: none" role="alert">
                        <span class="alert-inner--text"><strong>Advertencia: </strong> Sólo se aceptan archivos con extensiones .jpeg, .jpe, .jpg, .png</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>



                    <div class="form-group justify-content-center align-items-center">
                        <label>Foto Actual</label>
                        <div class="form-group">
                            <img src="{{asset($current_speaker->user_image)}}" alt="{{$current_speaker->name}}" class="img-fluid img-thumbnail" width="600px">
                        </div>
                    </div>





                    <div class="row  mt-5 d-flex justify-content-center">
                        <div class="col-lg-4 col-12">
                            <a href="{{  url()->previous()  }}" type="button" class="btn btn-danger">Cancelar</a>

                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <button type="submit" class="btn btn-default">Actualizar</button>

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