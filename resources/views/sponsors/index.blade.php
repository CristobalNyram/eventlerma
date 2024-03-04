@extends('layouts.app')

@section('content')
@include('sponsors.headers_cards')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>


<div class="container-fluid mt--6">
  <div class="row d-flex mb-3 mr-5 justify-content-end">
    @if ( check_acces_to_this_permission(Auth::user()->role_id,30))

    <a href="{{ route('sponsor_create') }}" type="button" class="btn btn-info">Agregar</a>
    @endif

  </div>

  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Patrocinadores registrados</h3>
        </div>
        <!-- Light table -->
        <script>

        </script>
        <div class="table-responsive">
            <table class="table align-items-center table-striped table-flush table-bordered dt-responsive" id="table_users_all">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="id">ID</th>
                        <th scope="col" class="sort" data-sort="name">Nombre</th>
                        <th scope="col" class="sort" data-sort="slogan">Eslogan</th>
                        <th scope="col" class="sort" data-sort="url_img">Foto</th>
                        <th scope="col" class="sort" data-sort="status">Estado</th>
                        <th scope="col" class="sort" data-sort="origin">Origen</th>
                        <th scope="col" class="sort" data-sort="phone_number">Número de Teléfono</th>
                        <th scope="col" class="sort" data-sort="email">Correo Electrónico</th>
                        <th scope="col" class="sort" data-sort="type">Tipo</th>
                        <th scope="col" class="sort" data-sort="actions">Acciones</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($sponsors_actives as $sponsor)
                    <tr>
                        <td>{{ $sponsor->id }}</td>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->slogan }}</td>
                        <td>
                            <button onclick="openImageModal('{{ asset($sponsor->url_img) }}', '{{ $sponsor->name }}', '{{ $sponsor->id }}')" class="btn btn-link" data-toggle="modal" data-target="#ventanaModal{{ $sponsor->id }}">
                                <img src="{{ asset($sponsor->url_img) }}" alt="{{ $sponsor->name }}" class="img-fluid img-thumbnail" width="80px">
                            </button>
                        </td>
                        <td>{{ $sponsor->status }}</td>
                        <td>{{ $sponsor->origin }}</td>
                        <td>{{ $sponsor->phone_number }}</td>
                        <td>{{ $sponsor->email }}</td>
                        <td>{{ $sponsor->type }}</td>
                        <td>
                            @if(check_acces_to_this_permission(Auth::user()->role_id, 30))
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('sponsor_update', $sponsor->id) }}">
                                        <i class="fas fa-edit"></i> Actualizar información
                                    </a>
                                    <form action="{{ route('sponsor_delete', $sponsor->id) }}" class="input-group form-eliminar" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="dropdown-item text-danger" value="Eliminar">
                                    </form>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modales -->
            @foreach ($sponsors_actives as $sponsor)
            <div class="modal fade" id="ventanaModal{{ $sponsor->id }}" tabindex="-1" role="dialog" aria-labelledby="ventanaModalLabel{{ $sponsor->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ventanaModalLabel{{ $sponsor->id }}">{{ $sponsor->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="media align-items-center">
                                <img src="{{ asset($sponsor->url_img) }}" alt="{{ $sponsor->name }}" class="img-fluid">
                            </div>
                            <p><strong>ID:</strong> {{ $sponsor->id }}</p>
                            <p><strong>Nombre:</strong> {{ $sponsor->name }}</p>
                            <p><strong>Eslogan:</strong> {{ $sponsor->slogan }}</p>
                            <p><strong>Estado:</strong> {{ $sponsor->status }}</p>
                            <p><strong>Origen:</strong> {{ $sponsor->origin }}</p>
                            <p><strong>Número de Teléfono:</strong> {{ $sponsor->phone_number }}</p>
                            <p><strong>Correo Electrónico:</strong> {{ $sponsor->email }}</p>
                            <p><strong>Tipo:</strong> {{ $sponsor->type }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

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
          last: "ultimo",
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
  function set_image_modal(url_img, name) {

    let imagemodal = document.getElementById('modal_watch_image_course');
    imagemodal.src = '';
    imagemodal.src = url_img;

    let titlemodal = document.getElementById('titulo');
    titlemodal.innerText = '';
    titlemodal.innerText = name;

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

@endpush
