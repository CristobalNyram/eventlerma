@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">



        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->

              <div class="card-header border-0">
                <h2 class="mb-0">Nuevo rol</h2>

              </div>


                        <form class="m-5"  action="{{route('role_store')}}"  method="POST">
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
                            <label for="exampleFormControlInput1">Nombre</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Nombre de rol"  max="50" required>
                            </div>

                            <div class="form-group">
                                    <label for="exampleFormControlInput1">Descripción</label>
                                    <input type="text" class="form-control form-control-lg" id="description" name="description" placeholder="Descripción de rol" required maxlength="50">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nivel</label>
                                <input type="number" class="form-control form-control-lg" id="level"  name="level" placeholder="Nivel de acceso" max="50">
                            </div>


                            <div class="form-group row d-flex justify-content-center">
                                <button type="submit" class="btn btn-default">Agregar</button>

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
