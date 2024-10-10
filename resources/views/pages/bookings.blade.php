@extends('home')

@section('content')
    <h2 class="title">Gestion de Reservaciones</h2>
    <section>
        <form action="{{route('bookingsByAccomodation')}}" method="POST">
            @method('GET')
            <label for="">Selecciona un alojamiento</label>
            <select class="form-control" name="select_accomodations">
                @foreach ($accomodations as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
            <input type="submit" class="btn btn-primary mt-2 mb-4" value="Buscar Reservaciones">
        </form>

        <!-- Tabla de reservaciones -->
        {{-- @php
            print_r($bookings)
        @endphp --}}
        <table class="table">
            <thead>
                <th>Booking</th>
                <th>Monto Total</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Alojamiento</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @if (count($bookings) > 0)
                    @foreach ($bookings as $item)
                    @php
                        //operador ternario
                        //agregamos estilo en base al status de la reservacion
                        $style = ($item->status == 'CONFIRMED') ? 'text-success fw-bold' : 'text-danger fw-bold';

                        $disabled = ($item->status != 'CONFIRMED') ? 'disabled' : '';

                        $style_button = ($item->status != 'CONFIRMED') ? 'btn-secondary' : 'btn-danger';

                    @endphp
                        <tr>
                            <td>{{$item->booking}}</td>
                            <td>{{$item->total_amount}}</td>
                            <td>{{$item->check_in_date}}</td>
                            <td>{{$item->check_out_date}}</td>
                            <td>{{$item->accomodation}}</td>
                            <td class="{{$style}}">{{$item->status}}</td>
                            <td>
                                <form action="{{route('statusBooking', $item->id)}}" id="form-cancelar-{{$item->id}}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <button type="button" class="btn {{$style_button}}" onclick="cancelBooking({{$item->id}})" {{$disabled}}>Cancelar Reserva</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center text-danger">No hay reservaciones</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </section>
@endsection
<script>
    function cancelBooking(bookingId){
        console.log("Hola desde Laravel y JS");
        Swal.fire({
            title: "Estas seguro de cancelar la reservacion?",
            text: "Una vez cancelada no se puede revertir!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Cancelar Reservacion"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Cancelado!",
                    text: "La reservacion se ha cancelado",
                    icon: "success"
                });
                console.log(bookingId);
                //desde de aqui hacer un submit para laravel
                //una vez que se encuentre el id del formulario hacemos un submit para accionar en laravel
                document.getElementById('form-cancelar-' + bookingId).submit();
            }
            });
    }
</script>