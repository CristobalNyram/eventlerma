@extends('layouts.app')

@section('content')
@include('admin.event.attended.headers_cards')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>


<div class="container-fluid mt--6">
  {{-- <div class="row d-flex mb-3 mr-5 justify-content-end">
    @if ( check_acces_to_this_permission(Auth::user()->role_id,12))

    <a href="{{ route('event_create') }}" type="button" class="btn btn-info">Agregar</a>

    @endif
  </div> --}}

  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Asistentes registrados</h3>
        </div>
        <!-- Light table -->
        <script>

        </script>
        <div class="table-responsive">
            <table class="table align-items-center table-striped table-flush table-bordered dt-responsive" id="table_users_all">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="id">FOLIO</th>
                        <th scope="col" class="sort" data-sort="name">Nombre de asistente</th>
                        <th scope="col" class="sort" data-sort="slug">Estatus de pago</th>
                        <th scope="col" class="sort" data-sort="description">Comprobante de pago</th>
                        <th scope="col" class="sort" data-sort="date">Fecha de registro</th>
                        <th scope="col" class="sort" data-sort="actions">Acciones</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach($regs as $reg)
                    <tr>
                        <td>{{ $reg->id }}</td>
                        <td>{{ $reg->user_name }}</td>
                        <td>

                                @if ($reg->event_cost > 0 && $reg->payment_status == 2)
                        <span class="badge badge-success">Pagado</span>
                        @elseif ($reg->event_cost <= 0 && $reg->payment_status == 2)
                            <span class="badge badge-primary">Gratuito</span>
                        @elseif ($reg->event_cost > 0 && $reg->payment_status != 2)
                        <span class="badge badge-warning">Pendiente</span>

                        @endif
                        </td>

                        <td>
                        @if ($reg && !empty($reg->payment_receipt_url))
                            <img src="{{ asset($reg->payment_receipt_url) }}" alt="{{ $reg->payment_receipt_url }}" class="img-fluid img-thumbnail modal-trigger" data-toggle="modal" data-target="#imageModal" data-url="{{ asset($reg->payment_receipt_url) }}" width="auto">
                        @endif
                        </td>
                        <td>{{ $reg->event_attended_created_at }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" target="_blanck"
                                    href="{{ route('view_badge_event', ['event_id' => $reg->event_id, 'user_id' => $reg->user_id]) }}"
                                    >
                                    <i class="fas fa-id-badge"></i> Gafete digital
                                </a>
                                @if ($reg->event_cost > 0 && $reg->payment_status != 2)
                                <form id="approvePaymentForm_{{ $reg->event_id }}_{{ $reg->user_id }}" method="POST" action="{{ route('change_payment_status_form', ['event_id' => $reg->event_id, 'user_id' => $reg->user_id]) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Botón para aprobar el comprobante de pago con confirmación -->
                                    <button type="submit" class="dropdown-item approve-payment-button" data-form-id="approvePaymentForm_{{ $reg->event_id }}_{{ $reg->user_id }}" onclick="return confirm('¿Estás seguro de aprobar este comprobante de pago?')">
                                        <i class="fas fa-check-circle"></i> Aprobar comprobante de pago
                                    </button>
                                </form>
                            @endif


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

<!-- Modal para mostrar la imagen -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="modalImage" class="img-fluid" alt="Imagen">
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Escuchar envío de formularios
        document.querySelectorAll('.approvePaymentForm').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                var confirmMessage = '¿Estás seguro de aprobar este comprobante de pago?';

                // Mostrar mensaje de confirmación
                if (!confirm(confirmMessage)) {
                    event.preventDefault(); // Evitar que el formulario se envíe
                }
            });
        });
    });
</script>

<script>
  $(document).ready(function() {
    $('.modal-trigger').click(function() {
            // Obtener la URL de la imagen desde el atributo data-url
            var imageUrl = $(this).data('url');
            $('#modalImage').attr('src', "");

            // Mostrar la imagen en el modal
            $('#modalImage').attr('src', imageUrl);
        });

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
          first: "First",
          last: "Last",
          next: "Next",
          previous: "Previous"
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
    '¡Eliminado!',
    'Tu archivo se ha borrado completamente.',
    'success'
  )
</script>

@endif

<script type="text/javascript">
  $('.form-eliminar').submit(function(e) {
    e.preventDefault();

    Swal.fire({
      title: '¿Está seguro de que desea eliminarlo....?',
      text: "¡Después de completar la acción no se podrá revertir los cambios!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí. ¡Deseo eliminarlo!'
    }).then((result) => {
      if (result.isConfirmed) {

        this.submit();
      }
    })
  });
</script>
@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
@endpush
