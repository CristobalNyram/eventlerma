@extends('layouts.app')

@section('content')
@include('payments.headers_cards')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>


<div class="container-fluid mt--6">
  <div class="row d-flex mb-3 mr-5 justify-content-end">

    <a href="{{ route('course_create') }}" type="button" class="btn btn-info">Agregar</a>


  </div>

  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Pagos Registrados</h3>
        </div>
        <!-- Light table -->
        <script>

        </script>
        <div class="table-responsive">
          <table class="table align-items-center table-striped table-flush table-bordered dt-responsive" id="table_users_all">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">ID</th>
                <th scope="col" class="sort" data-sort="budget">Estudiante</th>
                <th scope="col" class="sort" data-sort="status">Paquete</th>
                <th scope="col" class="sort" data-sort="status">Precio</th>
                <th scope="col" class="sort" data-sort="status">Estatus</th>
                <th scope="col" class="sort" data-sort="status">Acciones</th>

              </tr>
            </thead>
            <tbody class="list">

              @foreach ($payments_student as $payment )
              <tr>
                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm"> {{ $payment->id }}</span>
                    </div>
                  </div>
                </th>


                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm">{{ $payment->student->name }} {{ $payment->student->first_surname }} {{ $payment->student->second_surname }} </span>
                    </div>
                  </div>
                </th>
                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm">{{ $payment->package->name }} </span>
                    </div>
                  </div>
                </th>
                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm">{{ $payment->package->price }} </span>
                    </div>
                  </div>
                </th>


                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">

                      <span class="name mb-0 text-sm badge  {{ $payment->get_name_badge_status() }}"> {{ $payment->get_name_status() }}</span>
                    </div>
                  </div>
                </th>







                <td class="text-cener">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                      @if ($payment->status!=2)
                      <form class="input-group form-aprovar" action="{{route('payment_aprove',$payment->id)}}" method="POST">
                        @csrf
                        <input type="submit" class="dropdown-item text-success" data-toggle="modal" data-target="#modal-notification" value="Aprobar pago">
                        </input>
                      </form>
                      @endif


                      <form class="input-group form-eliminar" action="{{route('payment_cancel',$payment->id)}}" method="POST">
                        @csrf
                        <input type="submit" class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-notification" value="Cancelar pago">
                        </input>
                      </form>
                    </div>
                  </div>
                </td>


              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <!-- Card footer -->

      </div>
    </div>
  </div>


  @include('layouts.footers.auth')
</div>




<script>
  $(document).ready(function() {
    $('#table_users_all').DataTable({
      language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "No encontramos nada.",
        info: "Mostrando página _PAGE_ de _PAGES_",
        infoEmpty: "No hay registros existentes.",
        infoFiltered: "(Fitrado de _MAX_  registros existentes)",
        loadingRecords: "Cargando...",
        search: "Buscar:",
        emptyTable: "No hay información disponible en la tabla.",
        paginate: {
          first: "Primero",
          last: "Ultimo",
          next: ">",
          previous: "<"
        },
      }
    });
  });
</script>

@endsection

@push('js')
{{-- <script src="{{ asset(assets) }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script>
  function set_image_modal(url_img, title) {

    let imagemodal = document.getElementById('modal_watch_image_course');
    imagemodal.src = '';
    imagemodal.src = url_img;

    let titlemodal = document.getElementById('titulo');
    titlemodal.innerText = '';
    titlemodal.innerText = title;

  }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'ok')
<script type="text/javascript">
  Swal.fire(
    'Cancelado!',
    'Tu solicitud de pago se ha cancelado correctamente.',
    'success'
  )
</script>

@endif
@if (session('aprobar') == 'ok')
<script type="text/javascript">
  Swal.fire(
    'Aprovado!',
    'Tu solicitud de pago se ha aprovado correctamente.',
    'success'
  )
</script>

@endif


<script type="text/javascript">
  $('.form-eliminar').submit(function(e) {
    e.preventDefault();

    Swal.fire({
      title: '¿Está seguro de que desea cancelarlo....?',
      text: "¡Después de completar la acción no se podrá revertir los cambios!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí. ¡Deseo cancelarlo!'
    }).then((result) => {
      if (result.isConfirmed) {

        this.submit();
      }
    })
  });
  $('.form-aprovar').submit(function(e) {
    e.preventDefault();

    Swal.fire({
      title: '¿Está seguro de que desea aprobar esta solicitud de pago....?',
      text: "¡Esta accion sera registrada!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí. ¡Deseo aprovar!'
    }).then((result) => {
      if (result.isConfirmed) {

        this.submit();
      }
    })
  });
</script>

@endpush