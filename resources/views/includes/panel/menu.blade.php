<h6 class="navbar-heading text-muted ">BASE DE DATOS MET</h6>

<ul class="navbar-nav ">
    <li class="nav-item  active ">
        <a class="nav-link  active " href="{{'/home'}}">
            <i class="ni ni-tv-2 text-danger"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/especialidades') }}">
            <i class="fa fa-database text-blue"></i> Registros MET-004 SLLP{{-- EN i class van los iconos weon --}}
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ url('/metslvr') }}">
          <i class="fa fa-database text-blue"></i> Registros MET-004 SLVR{{-- EN i class van los iconos weon --}}
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ url('/metslcb') }}">
        <i class="fa fa-database text-blue"></i> Registros MET-004 SLCB{{-- EN i class van los iconos weon --}}
    </a>
  </li>
    
    
        <a class="nav-link" href="{{route ('logout')}}" 
            onclick="event.preventDefault(); document.getElementById('form-logout').submit()">
            <i class="fas fa-sign-in-alt"></i> Cerrar Sesión 
        </a>
      <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout">
        @csrf
      </form>
    </li>
  </ul>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="ni ni-books text-default"></i> varios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño 
      </a>
    </li>

  </ul>
  