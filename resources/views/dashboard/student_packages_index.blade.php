


<div class="row mt-5 ml-4 mr-3">
    @foreach ($course_available as $course)
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0  mb-5">
        <div class="card card-profile shadow mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                    {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                    <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> --}}
                </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">


                            <div>
                                <span class="heading">{{ $course->title }}</span>
                                <span class="description">  {{ __('') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h3>
                        Ponente: {{ $course->teacher->name }}  {{ $course->teacher->second_surname }}
                    </h3>


                    <div>
                        <i class="ni education_hat mr-2"></i>Capacidad de {{ $course->maximum_person }} personas
                    </div>
                    <hr class="my-4" />
                    <p>{{ __('Descripción.') }}</p>
                    <a href="#">{{ __('Inscribirme') }}</a>
                </div>
            </div>
        </div>
    </div>


    @endforeach



</div>

