@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">



        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->

              <div class="card-header border-0">
                <h2 class="mb-0">Actualizar información del usuario: {{ $current_user->name }}</h2>

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
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{    $current_user->name  }}" placeholder="Nombre de usuario"  max="50" required oninput="uppercaseLetters(event);">
                            </div>

                            <div class="form-group">
                                <label for="first_surname">Apellido de parterno</label>
                                <input type="text" class="form-control form-control-lg" id="first_surname" name="first_surname" value="{{ $current_user->first_surname }}" placeholder="Apellido paterno de usuario"  max="50" required  oninput="uppercaseLetters(event);">
                            </div>
                            <div class="form-group">
                                <label for="second_surname">Apellido de materno</label>
                                <input type="text" class="form-control form-control-lg" id="second_surname" name="second_surname" value="{{ $current_user->second_surname }}" placeholder="Apellido materno de usuario"  max="50"  required oninput="uppercaseLetters(event);">
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
