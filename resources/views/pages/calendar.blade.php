@extends('home')

@section('content')
    <div class="mt-4" id="calendar">
        <!-- calendario -->
    </div>
@endsection
<!-- agregando scripts dentro de una pila -->
@push('scripts_calendar')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script>
        //procesar el calendario
        document.addEventListener('DOMContentLoaded', function() {
            console.log(@json($bookings));
            
            //variable que va contener el calendario (<div)
            const contentCalendar = document.getElementById('calendar');
            //variable para crear el calendario
            const calendar = new FullCalendar.Calendar(contentCalendar, {
                //la estructura del calendario
                locale: 'es',
                //asignamos el limite de horario para el calendario (horas)
                slotMinTime: '00:00',
                slotMaxTime: '24:00',
                /**
                 * timeGridWeek
                 * lisWeek
                 * el calendario mostrara por mes
                 */
                initialView: 'dayGridMonth',
                events: @json($bookings),
                eventContent: function(arg) {
                    //personalizamos el contenido del evento (booking)
                    const titleEl = document.createElement('div');
                    titleEl.innerHTML = arg.event.title;

                    const totalAmountEl = document.createElement('div');
                    totalAmountEl.innerHTML = 'Monto Total:' + arg.event.extendedProps.total_amount;

                    const accomodationEl = document.createElement('div');
                    accomodationEl.innerHTML = 'Alojamiento: ' + arg.event.extendedProps.accomodation;

                    console.log(accomodationEl);
                    const arrayOfDomNodes = [ titleEl, totalAmountEl, accomodationEl ]
                    return { domNodes: arrayOfDomNodes }

                }
            });
        calendar.render();
        });
    </script>
@endpush