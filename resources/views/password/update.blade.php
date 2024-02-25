@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">



        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->

              <div class="card-header border-0">
                <h2 class="mb-0">Actualizar contraseña del usuario:{{ $current_user->name }}  {{ $current_user->first_surname }} {{ $current_user->second_surname }}</h2>

              </div>


                        <form class="m-5"  action="{{route('password_edit')}}"  method="POST">
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

                                <label for="password">Nueva Contraseña</label>
                                <input type="hidden" name="id" id="id" value="{{$current_user->id}}">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" value="{{ old('password')}}" placeholder="Nueva Contraseña"  max="50" required  oninput="uppercaseLetters(event);">
                            </div>
                            <div class="form-group">
                                <label for="second_surname">Confirmar Contraseña</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" value="{{ old('password') }}" placeholder="confirmar contraseña"  max="50"  required oninput="uppercaseLetters(event);">
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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
