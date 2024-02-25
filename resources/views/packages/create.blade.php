@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Agregar Paquete</h2>

                </div>


                <form class="m-5" action="{{route('package_store')}}" method="POST">
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
                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{   old('name') }}" placeholder="Nombre del paquete" max="50" required oninput="uppercaseLetters(event);">
                    </div>


                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="description" class="form-control form-control-lg" id="description" name="description" value="{{ old('description') }}" placeholder="Descripción" max="50" required oninput="uppercaseLetters(event);">
                    </div>


                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control form-control-lg" id="price" name="price" value="{{ old('price') }}" placeholder="Precio del paquete" max="11000" required >
                    </div>


                    <div class="form-group">
                        <label for="souvenir_id">Souvenir</label>
                        <input type="text" class="form-control form-control-lg" id="souvenir_id" name="souvenir_id" value="{{ old('souvenir_id') }}" placeholder="ID del Souvenir" max="50" required oninput="uppercaseLetters(event);">
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
