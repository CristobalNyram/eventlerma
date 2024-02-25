@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>


<div class="container-fluid mt--6">
    <div class="row d-flex mb-3 mr-5 justify-content-end">
        @if ( check_acces_to_this_permission(Auth::user()->role_id,33))

        <a href="{{ route('rally_create') }}" type="button" class="btn btn-info">Agregar</a>
        @endif

    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Rallys registrados</h3>
                </div>
                <!-- Light table -->
                <script>

                </script>
                <div class="table-responsive">
                    <table class="table align-items-center table-striped table-flush table-bordered dt-responsive" id="table_users_all">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">ID</th>
                                <th scope="col" class="sort" data-sort="budget">Nombre</th>
                                <th scope="col" class="sort" data-sort="budget">Imagen</th>
                                <th scope="col" class="sort" data-sort="status">Descripción</th>
                                <th scope="col" class="sort" data-sort="status">Requisitos</th>
                                <th scope="col" class="sort" data-sort="status">Precio</th>
                                <th scope="col" class="sort" data-sort="status">Ubicacion</th>
                                <th scope="col" class="sort" data-sort="status">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="list">

                            @foreach ($rallys_actives as $rally )
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> {{ $rally->id }}</span>
                                        </div>
                                    </div>
                                </th>

                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{ $rally->name }} </span>
                                        </div>
                                    </div>
                                </th>

                                <th scope="row">
                                    <button onclick="set_image_modal('{{asset($rally->img)}}' , '{{ $rally->name}}')" class="btn" data-toggle="modal" data-target="#ventanaModal">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm"><a src="{{asset($rally->img)}}"><img src="{{asset($rally->img)}}" alt="{{$rally->name}}" class="img-fluid img-thumbnail" width="80px"> </a> </span>
                                            </div>
                                        </div>
                                    </button>
                                </th>

                                <!--Modal -->
                                <div class="modal" id="ventanaModal" tableindex="-1" role="dialog" aria-labellebdy="titulo" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 id="titulo"></h5>
                                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm"><img id="modal_watch_image_rally" alt="{{$rally->name}}" class="img-fluid img-thumbnail" width="100%"> </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> {{ $rally->description}}</span>
                                        </div>
                                    </div>
                                </th>

                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> {{ $rally->requirements}}</span>
                                        </div>
                                    </div>
                                </th>
                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> {{ $rally->price}}</span>
                                        </div>
                                    </div>
                                </th>
                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> {{ $rally->location}}</span>
                                        </div>
                                    </div>
                                </th>

                                <td class="text-cener">
                                    @if ( check_acces_to_this_permission(Auth::user()->role_id,33))

                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('rally_update',$rally->id)}}">Actualizar
                                                información</a>
                                            <form action="{{ route('rally_delete',$rally->id)}}" class="input-group form-eliminar" method="post">
                                                @csrf

                                                <input class="dropdown-item text-danger" type="submit" data-toggle="modal" data-target="#modal-notification" value="Eliminar"></input>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
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

<!-- Mostar modal de imagen -->
<script>
    function set_image_modal(img, name) {

        let imagemodal = document.getElementById('modal_watch_image_rally');
        imagemodal.src = '';
        imagemodal.src = img;

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