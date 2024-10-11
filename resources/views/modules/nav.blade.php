<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Panel de Control</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/accomodations')}}">Gestion de alojamientos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/bookings')}}">Gestion de Reservaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/formulario')}}">Registro de reservaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/calendar')}}">Calendario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="__blank" href="{{url('/reporte')}}">Reporte</a>
            </li>
            </ul>
        </div>
    </div>
</nav>