<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/calendar.css">
    <title>Gestion de Alojamientos</title>
</head>
<body>
    <!-- menu de navegacion -->
    @include('modules.nav')
    <!-- contenido principal-->
    <section class="container">
        <!-- condicionando que el contenedor de bienvenida solo aparezca en la pagina principal (pagina de raiz (/)) -->
        @if (Request::is('/'))
            <div class="container_welcome">
                <h1 class="title">Gestion de Reservaciones y Alojamientos</h1>
                <img src="https://res.cloudinary.com/dmddi5ncx/image/upload/v1727886668/practicas/laravel/buscar_ftdjfr.png" alt="">
            </div>
        @endif
        <!-- creando contenido dinamico -->
        <div>
            @yield('content')
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts_calendar')
</html>