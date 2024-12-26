<div>
    <div class="card-header">
        <input wire:model="buscar" class="form-control" placeholder="Busquedad por nombre o correo">
    </div>


    @if ($reservas->count())
        <div class="card-body ">
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th role="button" wire:click="order('id_reserva')">Id Reserva</th>
                            <th role="button" wire:click="order('id_clase')">Clase</th>
                            <th role="button" wire:click="order('id_usuario')">Usuario</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->id_reserva }}</td>
                                <td>{{ $reserva->nombreClase }}</td>
                                <td>{{ $reserva->name }}</td>
                                <td width="200px">
                                    <a href="{{ route('reservas.show', $reserva->id_reserva) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @can('users')
                                        <a href="{{ route('reservas.edit', $reserva->id_reserva) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <button type="submit" form="delete_{{ $reserva->id_reserva }}"
                                            onclick="return confirm('¿estas seguro de eliminar el registro?')">
                                            <i class="fas fa-trash"></i>
                                            <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}"
                                                id="delete_{{ $reserva->id_reserva }}" method="post"
                                                enctype="multipart/form-data" hidden>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $reservas->links() }}
        </div>
       
        @else
        <div class="car-body">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <strong>
                    Advertencia,
                </strong>
                No coincide con mas registros
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
    @endif

    <div id='calendar' style="background:white"></div>
    <!-- Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Agendar servicio</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addEventForm" action="{{ route('reservas.store') }}" method="POST" >
                         @csrf
                         <div class="form-group">
                         <input type="text" name="id_usuario" value="{{Auth::user()->id}}" hidden>
                         </div>
                         <div class="form-group">
                            <label for="eventDate">Servicio</label>
                            <select name="id_clase" id="id_clase" class="form-control" name="id_clases">
                                <option value="-1" >Seleccione...</option>
                                @foreach($clases as $clase)
                                    <option value="{{$clase->id_clase}}">{{$clase->nombreClase}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Fecha (año-mes-dia)</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Franja (AM - PM)</label>
                            <select name="franja" id="franja" class="form-control">
                                <option value="08:00-12:00" name="comienza">AM (8-12)</option>
                                <option value="14:00-18:00" name="termina">PM (14-18)</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="saveEventButton" form="addEventForm">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            navLinkDayClick: false,
            timeZone: 'America/Bogota',
            initialView: 'dayGridMonth',
            headerToolbar: {
            left: 'prev,next addEventButton',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        customButtons: {
            addEventButton: {
                text: 'Agendar',
                click: function() {
                    var dateStr = $('#addEventModal').modal('show');
                    var date = new Date(dateStr + 'T00:00:00'); // will be in local time


                    if (!isNaN(date.valueOf())) { // valid?

                        calendar.addEvent({
                        title: 'dynamic event',
                        start: date,
                        allDay: true
                     });
                     alert('Great. Now, update your database...');

                    }
                }
            }
        },
        selectable: false,
        events:  {!! json_encode($eventos) !!},
        description: 'descripcion',
        eventClick: function() {
                    var dateStr = $('#addEventModal').modal('show');
                    var date = new Date(dateStr + 'T00:00:00'); // will be in local time


                    if (!isNaN(date.valueOf())) { // valid?

                        calendar.addEvent({
                        title: 'dynamic event',
                        start: date,
                        allDay: true
                     });
                     alert('Great. Now, update your database...');

                    }},
                    eventMouseEnter: function (info) {
                        var evento = info.event;
            var datos = evento.datos;
            var contenidoPopover = "Titulo: "+evento.title+"<br/>Descripcion: "+evento.extendedProps.description+"<br/>Cupo: "+evento.extendedProps.cupo;
            $(info.el).popover({
                content: contenidoPopover,
                placement:"top",
                trigger:"hover",
                html:true
            });
            $(info.el).popover("show");
    },
    eventMouseLeave: function (info) {
        $(info.el).popover("hide");
    },
        
        eventColor: 'purple',
        selectable: true,
        locale: 'es',
        buttonIcons: true, // show the prev/next text
        weekNumbers: true,
        navLinks: false, // can click day/week names to navigate views
        editable: false,
        dayMaxEvents: false, // allow "more" link when too many events
    });
        calendar.render();
      });

    </script>
