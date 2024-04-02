@extends('layouts.app')

@section('content')
@include('admin.event.headers_cards')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>


<div class="container-fluid mt--6">
  <div class="row d-flex mb-3 mr-5 justify-content-end">
    @if ( check_acces_to_this_permission(Auth::user()->role_id,12))

    <a href="{{ route('event_create') }}" type="button" class="btn btn-info">Agregar</a>

    @endif
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Eventos registrados</h3>
        </div>
        <!-- Light table -->
        <script>

        </script>
        <div class="table-responsive">
            <table class="table align-items-center table-striped table-flush table-bordered dt-responsive" id="table_users_all">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="id">ID</th>
                        <th scope="col" class="sort" data-sort="name">Título</th>
                        <th scope="col" class="sort" data-sort="slug">Slug</th>
                        <th scope="col" class="sort" data-sort="description">Descripción</th>
                        <th scope="col" class="sort" data-sort="capacity">Límite</th>
                        <th scope="col" class="sort" data-sort="time">Hora</th>
                        <th scope="col" class="sort" data-sort="duration">Duración</th>
                        <th scope="col" class="sort" data-sort="date">Fecha de registro</th>
                        <th scope="col" class="sort" data-sort="url_photo">Foto</th>
                        <th scope="col" class="sort" data-sort="status">Estatus</th>
                        <th scope="col" class="sort" data-sort="actions">Acciones</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach($regs as $reg)
                    <tr>
                        <td>{{ $reg->id }}</td>
                        <td>{{ $reg->name }}</td>
                        <td>{{ $reg->slug }}</td>
                        <td>{{ $reg->description }}</td>
                        <td>{{ $reg->capacity }}</td>
                        <td>{{ $reg->time }}</td>
                        <td>{{ $reg->duration }}</td>
                        <td>{{ $reg->date }}</td>
                        <td>
                            <img src="{{ asset($reg->url_photo) }}" alt="{{ $reg->name }}" class="img-fluid img-thumbnail modal-trigger" data-toggle="modal" data-target="#imageModal" data-url="{{ asset($reg->url_photo) }}" width="15px" height="15px">
                        </td>
                        <td>
                            @if($reg->status == 2)
                            Activo
                            @else
                                Inactivo
                            @endif
                            {{--   @if($reg->status == 2)
                            Activo
                            @else
                                Inactivo
                            @endif --}}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('event_user_index', $reg->id) }}">
                                        <i class="fas fa-list"></i> Lista de asistentes
                                    </a>
                                    @if(check_acces_to_this_permission(Auth::user()->role_id, 12))
                                    <a class="dropdown-item" href="{{ route('event_edit', $reg->id) }}">
                                        <i class="fas fa-edit"></i> Actualizar información
                                    </a>
                                    <form class="input-group form-eliminar" id="form-delete-event-{{ $reg->id }}" action="{{ route('event_delete', $reg->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <!-- Agregar botón o enlace para eliminar -->
                                        <button type="submit" class="dropdown-item text-danger">Eliminar</button>
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
    'Tu evento se ha borrado completamente.',
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

@endpush
