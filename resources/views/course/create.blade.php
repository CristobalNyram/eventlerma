@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Agregar Curso</h2>

                </div>


                <form class="m-5" action="{{route('course_store')}}" method="POST" enctype="multipart/form-data">
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
                        <label for="title">Título</label>
                        <input type="text" class="form-control form-control-lg" id="title" name="title" value="{{   old('title') }}" placeholder="Título del curso" max="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control form-control-lg" id="description" name="description" value="{{ old('description') }}" placeholder="Descripción" max="50" required oninput="uppercaseLetters(event);">
                    </div>
                    <div class="form-group">
                        <label for="maximum_person">Límite de personas</label>
                        <input type="number" class="form-control form-control-lg" id="maximum_person" name="maximum_person" value="{{ old('maximum_person') }}" placeholder="Límite de personas" max="50" required>
                    </div>
                    <div class="form-group">
                        <label for="requeriments">Requerimientos para impartir curso</label>
                        <input type="file" class="form-control form-control-lg" id="requeriments" name="requeriments" value="{{ old('requeriments') }}" placeholder="Límite de personas" max="50" required>
                    </div>
                    <div class="form-group">
                        <label for="hour">Hora que sera el curso</label>
                        <input type="text" class="form-control form-control-lg" id="hour" name="hour" value="{{ old('hour') }}" placeholder="Hora que sera el curso" max="50" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duración del curso</label>
                        <input type="text" class="form-control form-control-lg" id="duration" name="duration" value="{{ old('duration') }}" placeholder="Duración del curso" max="50" required>
                    </div>
                    <div class="form-group">
                        <label for="date">date</label>
                        <input type="text" class="form-control form-control-lg" id="date" name="date" value="{{ old('date') }}" placeholder="Fecha del curso" max="50" required >
                    </div>

                    <div class="form-group">
                        <label for="url_img">Foto</label>
                        <input type="file" onBlur='LimitAttach(this,1)' ; accept="image/png, image/jpg, image/jpeg" class="form-control form-control-lg" id="url_img" name="url_img" value="{{ old('url_img') }}" placeholder="Foto del curso" max="50" required >
                    </div>

                    <div class="alert alert-warning alert-dismissible fade show" id="alerta" role="alert" style="display: none"  role="alert">
                        <span class="alert-inner--text"><strong>Advertencia: </strong> Sólo se aceptan archivos con extensiones .jpeg, .jpe, .jpg, .png</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <script type="text/javascript">
                        
                    </script>

                    <div class="form-group">
                        <label for="speaker_id">Ponente / Profesor</label>

                        <select class="form-control form-control-lg  single-select-2 " data-toggle="select2" name="speaker_id" id="speaker_id">
                            <option value="-2" selected>Seleccionar</option>
                            @foreach ($users_speakers as $user )
                            <option value="{{ $user->id }}">{{ $user->name }}</option>

                            @endforeach
                        </select>
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
<script src="/assets/js/select2.js"></script>

<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
