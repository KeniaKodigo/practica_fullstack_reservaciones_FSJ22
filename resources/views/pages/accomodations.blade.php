@extends('home')

<!-- utilizando el yield de la vista principal (Home) -->
@section('content')
    <h2 class="title">Gestion de Alojamientos</h2>
    {{-- @php
        //testeando si la informacion esta llegando
        print_r($details) //[]
    @endphp --}}
    <div class="container_accomodations">
        @if (count($details) > 0)
            <!-- Iterando la informacion de los alojamientos -->
            @foreach ($details as $item)
                <div class="card">
                    <img src="{{$item->image}}" alt="">
                    <h3>{{$item->name}}</h3>
                    <p><strong>Direccion:</strong> {{$item->address}}</p>
                </div>
            @endforeach
        @else
            <h3>No hay Alojamientos...</h3>
        @endif
    </div>
@endsection
