@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<script scr="js/modal.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" crossorigin="anonymous">

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" defer></script>

    <div class="container-fluid mt--6">

        <script>
            var jq = jQuery.noConflict(true);
        </script>
                  <script>
                 jq('#table_users_all').DataTable( {

                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No encontramos nada.",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros existentes.",
                        "infoFiltered": "(Fitrado de _MAX_  registros existentes)",
                        "loadingRecords": "Cargando...",
                        "search":         "Buscar:",
                        "emptyTable":     "No hay información disponible en la tabla.",


                    }

                } );
            </script>

        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Configuraciones</h3>
              </div>
              <!-- Light table -->
              <script>

              </script>
              <div class="table-responsive">
                <table class="table align-items-center table-striped table-flush table-bordered dt-responsive"   data-order='[[ 1, "asc" ]]'  id="table_users_all">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">ID</th>
                      <th scope="col" class="sort" data-sort="budget">Título</th>
                      <th scope="col" class="sort" data-sort="status">Tipo</th>
                      <th scope="col" class="sort" data-sort="status">Description</th>
                      <th scope="col" class="sort" data-sort="status">Contenido</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>

                    </tr>
            </thead>
             <tbody class="list">

                    @foreach ($configuration_active as $configuration )
                    <tr>
                        <th scope="row">
                          <div class="media align-items-center">

                            <div class="media-body">
                              <span class="name mb-0 text-sm">  {{ $configuration->id }}</span>
                            </div>
                          </div>
                        </th>


                        <th scope="row">
                            <div class="media align-items-center">

                              <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $configuration->title }}  </span>
                              </div>
                            </div>
                        </th>

                        <th scope="row">
                            <div class="media align-items-center">

                              <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $configuration->type }}  </span>
                              </div>
                            </div>
                        </th>

                        <th scope="row">
                            <div class="media align-items-center">

                              <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $configuration->description}} </span>
                              </div>
                            </div>
                        </th>

                        <th scope="row">
                            <div class="media align-items-center">

                              <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $configuration->content}} </span>
                              </div>
                            </div>
                        </th>



                        <td class="text-cener">
                            <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                              <a class="dropdown-item" href="{{route('setting_update',$configuration->id)}}"> <i class="fas fa-edit"></i>Actualizar</a>
                              <form action="{{route('souvenir_delete',$configuration->id)}}" class="input-group form-eliminar" method="POST">
                               @csrf

                                <input type="submit" class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-notification" value="Eliminar" ></input>

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



@endsection

@push('js')
    {{-- <script src="{{ asset() }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script> --}}

    <script>

      function set_image_modal(url_img, name){

        let imagemodal= document.getElementById('modal_watch_image_course');
        imagemodal.src='';
        imagemodal.src=url_img;

        let titlemodal= document.getElementById('titulo');
        titlemodal.innerText='';
        titlemodal.innerText=name;

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
  $('.form-eliminar').submit(function(e){
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
