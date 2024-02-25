@extends('layouts.app')

@section('content')
@include('logbook.headers_cards')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Registro de actividad</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table data-order='[[ 1, "asc" ]]' class="table align-items-center table-striped table-flush table-bordered dt-responsive" id="table_logbook_all">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">Folio</th>
                <th scope="col" class="sort" data-sort="name">Usuario</th>
                <th scope="col" class="sort" data-sort="budget">Descripción</th>
                <th scope="col" class="sort" data-sort="status">Módulo</th>
                <th scope="col" class="sort" data-sort="status">Fecha</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($logs as $log )
              <tr>
                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm"> {{ $log->id }}</span>
                    </div>
                  </div>
                </th>


                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm"> {{ $log->users->name }} {{ $log->users->frist_surname }} {{ $log->users->second_surname }}</span>
                    </div>
                  </div>
                </th>
                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm"> {{ $log->description }}</span>
                    </div>
                  </div>
                </th>

                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm"> {{ $log->menus->title }}</span>
                    </div>
                  </div>
                </th>
                <th scope="row">
                  <div class="media align-items-center">

                    <div class="media-body">
                      <span class="name mb-0 text-sm"> {{ $log->created_at }}</span>
                    </div>
                  </div>
                </th>




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
    $('#table_logbook_all').DataTable({
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
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush