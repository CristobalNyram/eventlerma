@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Patrocinador</h3>
                </div>

                <!-- Light table -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Actualizar información del patrocinador: {{ $current_sponsor->name }}</h2>
                </div>


                <form class="m-5" action="{{route('sponsor_edit')}}" method="POST" enctype="multipart/form-data">
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
                    <div class="form-row">

                        <div class="form-group col-lg-12 col-12">
                            <input type="hidden" name="id" id="id" value="{{$current_sponsor->id}}">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{$current_sponsor->name  }}" placeholder="Título del patrocinador" maxlength="55" required oninput="uppercaseLetters(event);">
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="slogan">Slug</label>
                            <input type="text" class="form-control form-control-lg slug" id="slug" name="slug" value="{{ $current_sponsor->slug}}" placeholder="Slug" max="50" required  maxlength="55">
                        </div>

                        <div class="form-group col-lg-12 col-12">
                            <label for="slogan">Descripción</label>
                            <input type="text" class="form-control form-control-lg" id="slogan" name="slogan" value="{{ $current_sponsor->slogan }}" placeholder="Slogan" maxlength="55" required oninput="uppercaseLetters(event);">
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="slogan">Numero de telefono</label>
                            <input type="text" class="form-control form-control-lg phone_number" id="phone_number" name="phone_number" value="{{ $current_sponsor->phone_number }}" placeholder="Telefono" maxlength="13" required >
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="slogan">Correo electronico</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $current_sponsor->email }}" placeholder="Correo electronico" maxlength="55" required oninput="uppercaseLetters(event);">
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="type_sponsor_id">Tipo de empresa</label>
                            <select class="form-control" id="type_sponsor_id" name="type_sponsor_id" required>
                                <option value="" @if($current_sponsor->type_sponsor_id == '') selected @endif >Seleccionar</option>

                                @foreach($type_sponsor as $reg)
                                <option value="{{ $reg->id}}" {{ $current_sponsor->type_sponsor_id == $reg->id ? 'selected' : '' }}>{{  $reg->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-12">
                            <label for="origin_state_id">Origen</label>
                            <select class="form-control" id="origin_state_id" name="origin_state_id" required>
                                <option value="" @if($current_sponsor->origin_state_id == '') selected @endif>Seleccionar</option>

                                @foreach($origin_state as $reg)
                                <option value="{{ $reg->id}}" {{ $current_sponsor->origin_state_id == $reg->id ? 'selected' : '' }}> {{  $reg->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-12 col-12">
                            <label for="url_img">Foto del Patrocinador</label>
                            <input type="file" onBlur='LimitAttach(this,1)' ; accept="image/*" class="form-control form-control-lg" id="url_img" name="url_img" value="{{ $current_sponsor->url_img }}" placeholder="Foto del sponsor" max="50" required oninput="uppercaseLetters(event);">
                        </div>

                        <div class="col-lg-12 col-12 alert alert-warning alert-dismissible fade show" id="alerta" role="alert" style="display: none" role="alert">
                            <span class="alert-inner--text"><strong>Advertencia: </strong> Sólo se aceptan archivos con extensiones .jpeg, .jpe, .jpg, .png</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
                        </div>

                        <div class=" col-lg-12 col-12 form-group justify-content-center align-items-center">
                            <label>Foto Actual</label>
                            <div class="form-group">
                                <img src="{{asset($current_sponsor->url_img )}}" alt="{{$current_sponsor->name}}" class="img-fluid img-thumbnail" width="600px">
                            </div>
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
