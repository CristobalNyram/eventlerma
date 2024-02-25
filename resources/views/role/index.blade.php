<script  src='/assets/libraries/Jquery/jquery-3.6.0.min.js'></script>
<script  src='/assets/libraries/DataTablesJs/datatables.js'></script>

<link rel="stylesheet" type="text/css" href="/assets/libraries/DataTablesJs/datatables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>


@extends('layouts.app')

@section('content')
    @include('role.headers_cards')

    <div class="container-fluid mt--6">
        <div class="row d-flex mb-3 mr-5 justify-content-end">

            <a href="{{ route('role_create') }}" type="button" class="btn btn-info">Agregar</a>


        </div>

        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Roles </h3>
              </div>
              <!-- Light table -->
              <div class="table-responsive">


                <table data-order='[[ 1, "asc" ]]' class="table align-items-center table-striped table-flush table-bordered dt-responsive"  id="table_role_all">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre</th>

                      <th scope="col" class="sort" data-sort="status">Descripcióm</th>
                      <th scope="col" class="sort" data-sort="status">Nivel</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>


                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($roles as $rol )
                    <tr>
                        <th scope="row">
                          <div class="media align-items-center">

                            <div class="media-body">
                              <span class="name mb-0 text-sm">  {{ $rol->id }}</span>
                            </div>
                          </div>
                        </th>


                        <th scope="row">
                            <div class="media align-items-center">

                              <div class="media-body">
                                <span class="name mb-0 text-sm">  {{ $rol->name }}</span>
                              </div>
                            </div>
                        </th>
                        <th scope="row">
                            <div class="media align-items-center">

                              <div class="media-body">
                                <span class="name mb-0 text-sm">  {{ $rol->description }}</span>
                              </div>
                            </div>
                        </th>

                        <th scope="row">
                            <div class="media align-items-center">

                              <div class="media-body">
                                <span class="name mb-0 text-sm">  {{ $rol->level }}</span>
                              </div>
                            </div>
                        </th>

                        <td class="text-cener">
                            <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">Editar</a>
                                <a class="dropdown-item text-danger"  data-toggle="modal" data-target="#modal-notification" href="#" >Borrar</a>
                                <a class="dropdown-item " href="{{ route('role_assign',$rol->id)}}">Asignar permisos</a>
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
        @include('role.eliminar-modal-js')

    </div>





    <script>

        $(document).ready(function() {
            $('#table_role_all').DataTable( {
                language: {
                    lengthMenu: "Mostrar _MENU_ registros por página",
                    zeroRecords: "No encontramos nada.",
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay registros existentes.",
                    infoFiltered: "(Fitrado de _MAX_  registros existentes)",
                    loadingRecords: "Cargando...",
                    search:         "Buscar:",
                    emptyTable:     "No hay información disponible en la tabla.",
                    paginate: {
                        first:      "Primero",
                      last:       "ultimo",
                      next:       ">",
                      previous:   "<"
                    },
                }
            } );
        } );
        </script>
@endsection

@push('js')
{{-- <script src="{{ asset(assets) }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>



    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
