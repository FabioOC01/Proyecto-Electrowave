<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computadoras - ElectroWave</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	
    <link rel="stylesheet" href="css/inicio.css">
</head>

<header>
    <body>
        
    
    <nav class="nav">
    <a href="{{ url('/') }}"  class="nav-brand" >
          <img src="./img/Logo.png" alt=" ">
        </a>
    <div class="nav-left">
       

        <ul class="nav-menu">

            <div class="dropdown-container">
              <a href="{{ route('computadoras') }}" class="nav-link">
                Computadoras
              </a>
            </div>
              
                <div class="dropdown-container">
                  <a  href="{{ route('celulares') }}" class="nav-link">
                    Celulares
                  </a>
                </div>
                
                    
    </div>

                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro ') }}</a>
                                </li>
                            @endif
                        @else
                        <li>
                            <div class="dropdown-container">
                            <a href="#" class="nav-link">
                            {{ Auth::user()->name }}
                                        </svg>
                                    </a>
                            
                                <div class="dropdown-menu grid">
                                <a  class="dropdown-item" href="{{ url('/service_requests') }}" >Seguimiento</a>
                                <br>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    
        </ul>
    </nav>
</header>

<body>
   
    <header class="jumbotron text-center">
        <h5 class="display-4">Reparación de Computadoras</h5>
        <p class="lead">Brindamos todo tipo de reparaciones para tu Computadora o Laptop</p>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">¡Cotiza Ahora!</a>
    </header>

    <!-- Sección de servicios -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                <img class="card-img-top" src="./img/hard.jpg" alt="Reparación de Hardware">
                    <div class="card-body">
                        <h5 class="card-title">Reparación de Hardware</h5>
                        <p class="card-text">Diagnóstico y reparación de componentes físicos de tu computadora.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                <img class="card-img-top" src="./img/mantenimiento.jpg" alt="Reparación de Celulares">
                    <div class="card-body">
                        <h5 class="card-title">Limpieza y Mantenimiento</h5>
                        <p class="card-text">Mantenimiento preventivo y limpieza interna de tu equipo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                <img class="card-img-top" src="./img/ins.jpg" alt="Instalación de Software">
                    <div class="card-body">
                        <h5 class="card-title">Instalación de Software</h5>
                        <p class="card-text">Instalación y configuración de sistemas operativos y aplicaciones.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                <img class="card-img-top" src="./img/comp.jpg" alt="Reparación de Celulares">
                    <div class="card-body">
                        <h5 class="card-title" >Instalación de Componentes</h5>
                        <p class="card-text">Armado de computadoras o 
                                 componentes solos.</p>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 ElectroWave. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


