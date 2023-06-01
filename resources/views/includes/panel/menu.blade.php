<!-- Heading -->
<h6 class="navbar-heading text-muted">Gestionar</h6>
<ul class="navbar-nav">

    @if(auth()->user()->role == 'admin')
    <li class="nav-item  active ">
        <a class="nav-link  active " href="./home">
            <i class="ni ni-tv-2 text-primary"></i> Menú principal
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{url('/materias')}}">
            <i class="ni ni-collection text-blue"></i> Agregar Materias
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="/estudiantes">
            <i class="ni ni-hat-3 text-orange"></i> Gestionar Alumnos
        </a>
    </li>
    @elseif(auth()->user()->role == 'estudiante')
    <li class="nav-item  active ">
        <a class="nav-link  active " href="/home">
            <i class="ni ni-tv-2 text-primary"></i> Menú principal
        </a>
    </li>
    <li class="nav-item">
        <form action="{{ url('/estudiantes/'.auth()->id()) }}" method="GET">
            @csrf
            @method('DELETE')
            <a class="nav-link " href="{{ url('/estudiantes/'.auth()->id().'/cursos') }}">
            <i class="ni ni-collection text-blue"></i> Mis materias
        </a>
        </form>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="/estudiantes">
            <i class="ni ni-hat-3 text-orange"></i> Alumnos
        </a>
    </li>
    <li class="nav-item">
        <form action="{{ url('/estudiantes/'.auth()->id()) }}" method="POST">
            @csrf
            @method('DELETE')
            <a class="nav-link " href="{{ url('/estudiantes/'.auth()->id().'/edit') }}">
            <i class="ni ni-single-02 text-yellow"></i> Perfil del usuario
        </a>
        </form>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
        </a>
        <form action="{{route('logout')}}" method="POST" style="display:none;" id="formLogout">
            @csrf
        </form>
    </li>
</ul>