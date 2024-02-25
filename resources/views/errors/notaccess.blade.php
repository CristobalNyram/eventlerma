@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">

        <div class="alert alert-danger alert-dismissible fade show pt-5 pb-5" role="alert">


            <h2 class="alert-inner--text text-white">  <i class="fas fa-exclamation-triangle"></i>  <strong>¡No puedes pasar!</strong> No tienes acceso a esta funcionalidad</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
