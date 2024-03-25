<div class="container-fluid  mt-4  mr-2 ml-2 ">
    <div class="row">
        <div class="col-12">
            <h2>
                Mis eventos
            </h2>

        </div>
        @foreach ($my_events as $event)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"> {{ $event->event_id }}.-{{ $event->event_name }}</h5>
                    <p class="card-text">Costo: {{ $event->event_cost }}</p>

                    <p>
                        Estatus pago:
                        @if ($event->event_cost > 0 && $event->payment_status == 2)
                        <span class="badge badge-success">Pagado</span>
                        @elseif ($event->event_cost <= 0 && $event->payment_status == 2)
                            <span class="badge badge-primary">Gratuito</span>
                        @elseif ($event->event_cost > 0 && $event->payment_status != 2)
                        <span class="badge badge-warning">Pendiente</span>

                        @endif
                    </p>



                    @if ($event->payment_status == 1)
                    <a href="{{ route('event_payment_form', ['event_id' => $event->event_id, 'user_id' => $hashUserId]) }}" class="btn btn-warning btn-block">Formulario de Pago</a>
                    @elseif ($event->payment_status == 2)
                    <a href="{{ route('view_badge_event', ['event_id' => $event->event_id, 'user_id' => Auth::id()]) }}" class="btn btn-success btn-block">Descargar Gafete</a>
                    @endif

                    <a href="{{ route('home_page_event_detail', ['slug' => $event->event_slug]) }}" class="btn btn-primary btn-block mt-2">Mirar Evento</a>
                </div>
            </div>
        </div>
        @endforeach


        <!-- Puedes agregar más tarjetas aquí -->
    </div>
</div>
