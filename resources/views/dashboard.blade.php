@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    @if (Auth::user()->role_id==1 )
    @include('dashboard.admin_index')

    @endif

    @if (Auth::user()->role_id==4 || Auth::user()->role_id==5)



    {{-- @if(check_student_enrollment()==true) --}}
        @include('dashboard.student_enrollment')
    {{-- @endif --}}
    {{-- @if(check_student_enrollment()==false)
        @include('dashboard.student_package')
        @include('dashboard.student_course')
    @endif --}}


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
