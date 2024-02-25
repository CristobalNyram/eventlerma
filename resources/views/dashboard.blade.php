@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    @if (Auth::user()->role_id==1 )
    @include('dashboard.admin_index')

    @endif

    @if (Auth::user()->role_id==4 || Auth::user()->role_id==5)

    <script>

        let question = confirm("El equipo de Coders TI hemos desarrollado un pequeño videojuego. ¿Quieres probarlo? (se recomienda usar un PC y un navegador Chrome)"); // The "hello" means to show the following text
        if (question === true) {
            window.location.href="{{ route('game_index') }}";
        } else {
        // Do whatever if the user clicks cancel.
        }
        </script>


    @if(check_student_enrollment()==true)
        @include('dashboard.student_enrollment')
    @endif
    @if(check_student_enrollment()==false)
    @include('dashboard.student_package')
    @include('dashboard.student_course')
    @endif


    @endif

    @if (Auth::user()->role_id==6)
    @include('dashboard.teacher_info')

    @endif

    @if (Auth::user()->role_id==7)
    @include('dashboard.charger_index')

    @endif





        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
