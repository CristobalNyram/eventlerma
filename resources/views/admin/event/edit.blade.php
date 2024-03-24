@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Actualizar información del evento: {{ $reg->name }}</h2>

                </div>


                <form class="m-5" action="{{ route('event_update', $reg->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Usamos el método PUT para indicar que es una actualización -->

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
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endforeach
                    @endif

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $reg->name }}" placeholder="Nombre del evento" required max="45">
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control slug" readonly id="slug" name="slug" value="{{ $reg->slug }}" placeholder="Slug del evento" required maxlength="55">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descripción del evento" required>{{ $reg->description }}</textarea>
                    </div>
                    <div class="form-row">

                    <div class="form-group col-lg-6 col-12">
                        <label for="capacity">Capacidad</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $reg->capacity }}" placeholder="Capacidad del evento" required oninput="soloInputsEnterosYMayor0(this)">
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="time">Hora</label>
                        <input type="time" class="form-control" id="time" name="time" value="{{ date('H:i', strtotime($reg->time)) }}" />
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="duration">Duración</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $reg->duration }}" placeholder="Duración del evento" required>
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $reg->date }}" placeholder="Fecha del evento" required>
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="url_photo">Foto</label>
                        <input type="file" class="form-control-file" id="url_photo" name="url_photo" accept="image/png, image/jpg, image/jpeg">
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $reg->status == 1 ? 'selected' : '' }}>Inactivo</option>
                            <option value="2" {{ $reg->status == 2 ? 'selected' : '' }}>Activo</option>
                        </select>
                    </div>

                    <!-- Otros campos si los tienes -->

                    <div class="form-group col-lg-6 col-12">
                        <label for="type_event_id">Tipo de Evento</label>
                        <select class="form-control" id="type_event_id" name="type_event_id" required>
                            <option value="">Seleccionar</option>
                            @foreach($type_event as $type)
                            <option value="{{ $type->id }}" {{ $reg->type_event_id == $type->id ? 'selected' : '' }}>{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="place_events_id">Lugar del Evento</label>
                        <select class="form-control" id="place_events_id" name="place_events_id" required>
                            <option value="">Seleccionar</option>
                            @foreach($place_event as $place)
                            <option value="{{ $place->id }}" {{ $reg->place_events_id == $place->id ? 'selected' : '' }}>{{ $place->place_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="type_public_id">Tipo de Público</label>
                        <select class="form-control" id="type_public_id" name="type_public_id" required>
                            <option value="">Seleccionar</option>
                            @foreach($type_public as $type)
                            <option value="{{ $type->id }}" {{ $reg->type_public_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="row mt-5 d-flex justify-content-center">
                        <div class="col-lg-4 col-12">
                            <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Cancelar</a>
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

<script src="/assets/js/select2.js"></script>
<script src="/assets/js/validations/generalFunctions.js"></script>

<script src="/assets/js/validations/generalFunctions.js"></script>

<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
