@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')


<div class="container-fluid mt--6">

    <div class="card" style="width: 20rem; justify-content: center; margin-left: 20rem;">
        <img class="card-img-top" src="{{asset('assets/img/home/img')}}/certificado.jfif" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Felicidades has conclucido con exitos las horas del curso</h5>
            <p class="card-text">Por favor da click en descargar Certificado para obtener tu certificado de gratificación</p>
            <a href="{{route('certificate_pdf')}}" class="btn btn-primary">Descargar Certificado</a>
        </div>
    </div>




    @include('layouts.footers.auth')
</div>




<script>
    $(document).ready(function() {
        $('#table_users_all').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No encontramos nada.",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros existentes.",
                "infoFiltered": "(Fitrado de _MAX_  registros existentes)",
                "loadingRecords": "Cargando...",
                "search": "Buscar:",
                "emptyTable": "No hay información disponible en la tabla.",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                },
            }
        });
    });
</script>

@endsection

@push('js')
{{-- <script src="{{ asset() }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script> --}}



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script type="text/javascript">
    var contador = 0;
    var contador1 = 0;
    var contador2 = 0;

    function mostrar() {


    }
</script>

@endpush