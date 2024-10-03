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
            </thead>
            <tbody>
                @if (count($bookings) > 0)
                    @foreach ($bookings as $item)
                        <tr>
                            <td>{{$item->booking}}</td>
                            <td>{{$item->total_amount}}</td>
                            <td>{{$item->check_in_date}}</td>
                            <td>{{$item->check_out_date}}</td>
                            <td>{{$item->accomodation}}</td>
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