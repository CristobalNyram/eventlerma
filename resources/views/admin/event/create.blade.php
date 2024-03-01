@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Agregar evento</h2>

                </div>


                <form class="m-5" action="{{ route('event_store') }}" method="POST" enctype="multipart/form-data">
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
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre del evento" required>
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Slug del evento" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descripción del evento" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="capacity">Capacidad</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}" placeholder="Capacidad del evento" required>
                    </div>

                    <div class="form-group">
                        <label for="time">Hora</label>
                        <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" placeholder="Hora del evento" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" placeholder="Costo" required>
                    </div>

                    <div class="form-group">
                        <label for="duration">Duración</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" placeholder="Duración del evento" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" placeholder="Fecha del evento" required>
                    </div>

                    <div class="form-group">
                        <label for="url_photo">Foto</label>
                        <input type="file" class="form-control-file" id="url_photo" name="url_photo" accept="image/png, image/jpg, image/jpeg" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" @if(old('status') == '') selected @endif>Seleccionar</option>
                            <option value="1" @if(old('status') == '1') selected @endif>Inactivo</option>
                            <option value="2" @if(old('status') == '2') selected @endif>Activo</option>
                        </select>
                    </div>

                    <!-- Otros campos si los tienes -->

                    <div class="form-group">
                        <label for="type_event_id">Tipo de Evento</label>
                        <select class="form-control" id="type_event_id" name="type_event_id" required>
                            <option value="" @if(old('type_event_id') == '') selected @endif>Seleccionar</option>

                            @foreach($type_event as $reg)
                            <option value="{{ $reg->id}}" @if(old('type_event_id') == $reg->id) selected @endif>{{  $reg->type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="place_events_id">Lugar del Evento</label>
                        <select class="form-control" id="place_events_id" name="place_events_id" required>
                            <option value="" @if(old('place_events_id') == '') selected @endif>Seleccionar</option>
                            @foreach($place_event as $reg)
                            <option value="{{ $reg->id}}" @if(old('place_events_id') == $reg->id) selected @endif>{{  $reg->place_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type_public_id">Tipo de Público</label>
                        <select class="form-control" id="type_public_id" name="type_public_id" required>
                            <option value="" @if(old('type_public_id') == '') selected @endif>Seleccionar</option>
                            @foreach($type_public as $reg)
                            <option value="{{ $reg->id}}" @if(old('type_public_id') == $reg->id) selected @endif>{{  $reg->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mt-5 d-flex justify-content-center">
                        <div class="col-lg-4 col-12">
                            <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Cancelar</a>
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
<script>
        $('#slug').on('input', function() {
            var text = $(this).val();
            var formattedText = text.replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-_]/g, '').toLowerCase();
            $(this).val(formattedText);
        });

        // También puedes verificar al pegar texto en el campo
        $('#slug').on('paste', function(e) {
            var pasteData = e.originalEvent.clipboardData.getData('text');
            var validChars = /^[a-z0-9\-]+$/i;

            // Verificar si el texto pegado contiene caracteres no permitidos
            if (!validChars.test(pasteData)) {
                e.preventDefault();
                // Puedes mostrar un mensaje de error o limpiar el texto
                // Ejemplo: $(this).val('');
            }
        });
</script>
<script src="/assets/js/validations/generalFunctions.js"></script>
<script src="/assets/js/select2.js"></script>

<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
