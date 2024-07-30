@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Clases Emotifit</h5>
            @can('clases.create')
                <a href="{{ route('clases.create') }}" class="btn btn-primary ms-auto ">
                    <i class="fas fa-plus"></i>
                    Agregar</a>
            @endcan
        </div>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-4">

                <div class="form-group">

                    <a class="navbar-brand text-white">Listar</a>


                    <select class="custom-select" id="limit" name="limit">


                        @foreach ([5, 10, 15, 20] as $limit)
                            <option value="{{ $limit }}"
                                @if (isset($_GET['limit'])) {{ $_GET['limit'] == $limit ? 'selected' : '' }} @endif>

                                {{ $limit }}

                            </option>
                        @endforeach

                    </select>

                    <?php
                    if (isset($_GET['page'])) {
                        $pag = $_GET['page'];
                    } else {
                        $pag = 1;
                    }
                    if (isset($_GET['limit'])) {
                        $limit = $_GET['limit'];
                    } else {
                        $limit = 5;
                    }
                    $comienzo = $limit * ($pag - 1);
                    
                    ?>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <a class="navbar-brand text-white">Buscar</a>
                    <input class="form-control me-2" type="search" id="buscar" placeholder="Search" aria-label="Search"
                        value="{{ isset($_GET['buscar']) ? $_GET['buscar'] : '' }}">
                </div>
            </div>
        </div>
        @if ($clases->total() > 5)
            {{ $clases->links() }}
        @endif

        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Nombre de Clase</th>
                        <th>Cupo</th>
                        <th>Fecha</th>
                        <th>Comienza</th>
                        <th>Termina</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        @can('users')
                            <th>Accion</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $valor = 1;
                    if ($pag != 1) {
                        $valor = $comienzo + 1;
                    }
                    ?>
                    @foreach ($clases as $clase)
                        <tr>
                            <th scope="row">{{ $valor++ }}</th>
                            <td>{{ $clase->id_clase }}</td>
                            <td>{{ $clase->nombreClase }}</td>
                            <td>{{ $clase->cupo }}</td>
                            <td>{{ $clase->fecha }}</td>
                            <td>{{ $clase->comienza }}</td>
                            <td>{{ $clase->termina }}</td>
                            <td>{{ $clase->descripcion }}</td>
                            <td>
                                <img src="{{ asset('storage') . '/' . $clase->imagen }}" width="100px">
                            </td>

                            <td width="100px">
                                <form action="{{route('reservas.store')}}" method="POST" enctype="multipart/form-data" id="{{$valor}}">
                                    @csrf
                                    <input type="text" name="id_usuario" value="{{Auth::user()->id}}" hidden>
                                    <input type="text" name="id_clase" value="{{$clase->id_clase}}" hidden>
                                </form>
                                @if($clase->cupo === 0)
                                @else
                                {{-- <button class="btn-primary" form="{{$valor}}">Reservar</button> --}}
                                <button type="submit" form="{{$valor}}" class="btn-primary"
                                    onclick="return confirm('¿{{Auth::user()->name}} estas seguro de reservar la clase de {{ $clase->nombreClase }} ?')">
                                    Reservar
                                </button>
                                @endif
                                <a href="{{ route('clases.show', $clase->id_clase) }}"><i class="fas fa-eye"></i></a>
                                @can('users')
                                    <a href="{{ route('clases.edit', $clase->id_clase) }}"><i class="fas fa-edit"></i></a>

                                    <button type="submit" form="delete_{{ $clase->id_clase }}"
                                        onclick="return confirm('¿estas seguro de eliminar el registro?')">
                                        <i class="fas fa-trash"></i>
                                        <form action="{{ route('clases.destroy', $clase->id_clase) }}"
                                            id="delete_{{ $clase->id_clase }}" method="post" enctype="multipart/form-data"
                                            hidden>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </button>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-fooder">
            @if ($clases->total() > 5)
                {{ $clases->links() }}
            @endif
        </div>
    </div>

    <div id='calendar' style="background:white"></div>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            navLinks: true,
            navLinkDayClick: function(date, jsEvent) {
                console.log('day', date.toISOString());
                console.log('coords', jsEvent.pageX, jsEvent.pageY);
            },
            timeZone: 'UTC',
            locale: 'es',
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },


        events:  {!! json_encode($eventos) !!},
        eventColor: 'purple'
    
    });
        calendar.render();
      });

    </script>

    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('clases.index') }}?limit=" + $(this).val() + '&buscar=' + $(
                '#buscar').val()
        })

        $('#buscar').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('clases.index') }}?limit=" + $('#limit').val() + '&buscar=' + $(this).val()
            }
        })
    </Script>
@endsection
