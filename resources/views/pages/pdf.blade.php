<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Reporte de Reservaciones {{$year}}</title>
</head>
<style>
    h1{
        text-align: center;
        color: #2f2f6a;
    }
</style>
<body>
    <h1>Reporte de Reservaciones</h1>
    <p class="fw-bold">{{$date}}</p>

    <table class="table">
        <thead>
            <th>Reserva</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
            <th>Monto Total</th>
            <th>Alojamiento</th>
            <th>Usuario</th>
        </thead>
        <tbody>
            @foreach ($detail as $value)
                <tr>
                    <td>{{$value->booking}}</td>
                    <td>{{$value->check_in_date}}</td>
                    <td>{{$value->check_out_date}}</td>
                    <td>${{round($value->total_amount, 2)}}</td>
                    <td>{{$value->accomodation}}</td>
                    <td>{{$value->user}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="fw-bold">Total de Reservaciones: ${{round($total_bookings,2)}}</p>
</body>
</html>