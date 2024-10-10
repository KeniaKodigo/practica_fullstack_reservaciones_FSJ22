@extends('home')

@section('content')
    <h2 class="title">Registro de reservaciones</h2>
    <div class="d-flex justify-content-center">
        <div class="w-50">
            <form action="{{route('saveBooking')}}" method="POST">
                @csrf
                <div>
                    <label for="">Booking</label>
                    <input type="text" class="form-control" name="booking" value="{{ old('booking') }}">
                    @error('booking')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <label for="">Fecha de entrada</label>
                    <input type="date" class="form-control" name="in_date" value="{{ old('in_date') }}">
                    @error('in_date')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="">Fecha de salida</label>
                    <input type="date" class="form-control" name="out_date" value="{{ old('out_date') }}">
                    @error('out_date')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="">Monto Total</label>
                    <input type="text" class="form-control" name="total_amount" value="{{ old('total_amount') }}">
                    @error('total_amount')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="">Selecciona un alojamiento</label>
                    <select name="accomodation" id="" class="form-control">
                        <option value="">...</option>
                        @foreach ($accomodations as $item)
                            <option value="{{$item->id}}">{{$item->accomodation}}</option>
                        @endforeach
                    </select>
                    @error('accomodation')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    <label for="">Selecciona un usuario</label>
                    <select name="user" id="" class="form-control">
                        <option value="">...</option>
                        @foreach ($users as $data)
                            <option value="{{$data->id}}">{{$data->user}}</option>
                        @endforeach
                    </select>
                    @error('user')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    <input type="submit" class="btn btn-success mt-4" value="Guardar Reservacion">
                </div>
            </form>
        </div>
    </div>
@endsection