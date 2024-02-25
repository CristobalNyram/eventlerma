@if (check_if_requested_package_paid_out()==true && check_if_requested_course()==false)
<script>
    function fnSolicitarCurso(course_id, course_name) {
        // alert();

        let url_enviar = '';
        Swal.fire({
            html: '¿Estás seguro de que quieres inscribirte <strong> a  el curso ' + course_name + ' ? </strong>',
            showDenyButton: true,
            icon: 'question',
            confirmButtonText: 'Si, si quiero inscribirme',
            denyButtonText: `Cancelar inscripción`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            let _token = "{{ csrf_token()}}";
            if (result.isConfirmed) {


                let route = "{{ route('course_enroll') }}";
                let token = "{{ csrf_token()}}";
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: {
                        _token: token,
                        course_id: course_id,


                    },
                    success: function(response) {

                        if (response['status'] === 2) {
                            Swal.fire({
                                    title: response['title'],
                                    text: response['message'],
                                    icon: "success"
                                })
                                .then((value) => {

                                    location.reload();

                                })

                        } else {
                            Swal.fire({
                                    title: response['title'],
                                    text: response['message'],
                                    icon: "error"
                                })
                                .then((value) => {
                                    location.reload();

                                })
                        }

                    },
                    error: function(xhr) {
                        alert('Error en el servidor...');
                    }
                });
                // Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Cancelado', '', 'error')
            }
        })




    }
</script>



<div class="row">


    
    @foreach ($courses_available as $course)
    @if($course->status_course == 2)
    <div class="col-12 col-lg-6">

        <div class="card card-profile  m-5 " data-image="img-raised">
            <div class="card-header-image">
                <a href="javascript:;">
                    <div>
                        <img class="" src="{{asset($course->url_img )}}" width="100%" height="200px" alt="No cargo la imagen del curso {{ $course->title }}">
                    </div>
                </a>
                <div class="card-title text-danger text-center">
                    Profesor: {{ $course->teacher->name }}
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-category text-warning text-center h3">{{ $course->title }}</h6>
                <p class="card-description text-center">
                    {{ $course->description }}
                </p>
            </div>
            <div class="card-footer text-center">

                <button type="button" onclick="fnSolicitarCurso('{{$course->id }}','{{$course->title }}');" class="btn  btn btn-dribbble">
                    <span class="btn-inner--icon"><i class="fab fa-book"></i></span>
                    Inscribirme
                </button>

            </div>
        </div>

    </div>
    @endif


    @endforeach
</div>
@endif

@if (check_if_enrolled_in_course()==true && check_if_requested_course()==true)
<div class="container mt-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="ni ni-app"></i></span>
        <span class="alert-inner--text h3 text-white"><strong class="h1 text-white">¡Aviso!</strong> <br> Tu solicitud para inscribirte a un curso se ha realizado correctamente <u> </u>...</span>
    </div>

</div>

@endif