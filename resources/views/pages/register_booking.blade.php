@extends('home')

@section('content')
    <h2 class="title">Registro de reservaciones</h2>
    <div class="d-flex justify-content-center">
        <div class="w-50">
            <form action="" method="POST">
                <div>
                    <label for="">Booking</label>
                    <input type="text" class="form-control" name="booking" >
                    {{-- @error('address')
                        <small class="text-danger">{{$message}}</small>
                    @enderror --}}
                    <label for="">Fecha de entrada</label>
                    <input type="date" class="form-control" name="in_date" >

                    <label for="">Fecha de salida</label>
                    <input type="date" class="form-control" name="out_date" >

                    <label for="">Monto Total</label>
                    <input type="text" class="form-control" name="total_amount" >

                    <label for="">Selecciona un alojamiento</label>
                    <select name="accomodation" id="" class="form-control">
                        @foreach ($accomodations as $item)
                            <option value="{{$item->id}}">{{$item->accomodation}}</option>
                        @endforeach
                    </select>

                    <label for="">Selecciona un usuario</label>
                    <select name="user" id="" class="form-control">
                        @foreach ($users as $data)
                            <option value="{{$data->id}}">{{$data->user}}</option>
                        @endforeach
                    </select>

                    <input type="submit" class="btn btn-success mt-4" value="Guardar Reservacion">
                </div>
            </form>
        </div>
    </div>
@endsection