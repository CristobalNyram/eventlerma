@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->


                <div class="card-header border-0">
                    <h2 class="mb-0">Agregar empresa</h2>

                </div>


                <form class="m-5" action="{{route('sponsor_store')}}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-row">

                    <div class="form-group col-lg-12 col-12">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{   old('title') }}" placeholder="Nombre del patrocinador" maxlength="50" required oninput="uppercaseLetters(event);">
                    </div>


                    <div class="form-group col-lg-12 col-12">
                        <label for="slogan">Slug</label>
                        <input type="text" class="form-control form-control-lg slug" id="slug" name="slug" value="{{ old('slogan') }}" placeholder="Slug" maxlength="50" required >
                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="slogan">Eslogon</label>
                        <input type="text" class="form-control form-control-lg" id="slogan" name="slogan" value="{{ old('slogan') }}" placeholder="Eslogan" maxlength="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="slogan">Numero de telefono</label>
                        <input type="text" class="form-control form-control-lg phone_number" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Telefono" maxlength="13" required >
                    </div>


                    <div class="form-group col-lg-6 col-12">
                        <label for="slogan">Correo electronico</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}" placeholder="Correo electronico" maxlength="50" required oninput="uppercaseLetters(event);">
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="type_sponsor_id">Tipo de empresa</label>
                        <select class="form-control" id="type_sponsor_id" name="type_sponsor_id" required>
                            <option value="" @if(old('type_sponsor_id') == '') selected @endif>Seleccionar</option>

                            @foreach($type_sponsor as $reg)
                            <option value="{{ $reg->id}}" @if(old('type_sponsor_id') == $reg->id) selected @endif>{{  $reg->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="origin_state_id">Origen</label>
                        <select class="form-control" id="origin_state_id" name="origin_state_id" required>
                            <option value="" @if(old('origin_state_id') == '') selected @endif>Seleccionar</option>

                            @foreach($origin_state as $reg)
                            <option value="{{ $reg->id}}" @if(old('origin_state_id') == $reg->id) selected @endif>{{  $reg->name }}</option>
                            @endforeach
                        </select>
                    </div>





                    <div class="form-group col-lg-8 col-12">
                        <label for="url_img">Imagen</label>
                        <input type="file" onBlur='LimitAttach(this,1)' ; accept="image/*" class="form-control form-control-lg" id="url_img" name="url_img" value="{{ old('url_img') }}" placeholder="Foto del sponsor" max="50" required >
                    </div>

                    <div class="alert alert-warning alert-dismissible fade show" id="alerta" role="alert" style="display: none"  role="alert">
                        <span class="alert-inner--text"><strong>Advertencia: </strong> Sólo se aceptan archivos con extensiones .jpeg, .jpe, .jpg, .png</span>
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
