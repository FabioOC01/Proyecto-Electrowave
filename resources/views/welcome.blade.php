<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroWave</title>
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
                    
    <div class="jumbotron text-center">
        <h5 class="display-4">Bienvenido a ElectroWave</h5>
        <p class="lead">Tu solución confiable para la reparación de computadoras y celulares.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">¡Cotiza Ahora!</a>
    </div>

    
    <div id="services" class="container mt-5">
        <h2 class="text-center">Nuestros Servicios</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="img/reparacion lap.jpg" alt="Reparación de Computadoras">
                    <div class="card-body">
                        <h5 class="card-title">Reparación de Computadoras</h5>
                        <p class="card-text">Solucionamos problemas de hardware y software, actualizamos componentes y más.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="./img/domicilio.jpg" alt="Mantenimiento Preventivo">
                    <div class="card-body">
                        <h5 class="card-title">Servicio a Domicilio</h5>
                        <p class="card-text"><br> 
                           ¡Repara tu dispositivo sin salir de casa! <br>
                           Nuestro Experto irá a ayudarte. <br>
                           Paga al terminar el servicio.
                        </p>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="./img/reparacion cel.jpg" alt="Reparación de Celulares">
                    <div class="card-body">
                        <h5 class="card-title">Reparación de Celulares</h5>
                        <p class="card-text">Cambio de pantallas, baterías, problemas de software y más. </p>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

   

    <footer class="bg-light text-center py-4">
        <p>&copy; 2024 ElectroWave. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

                   
                </div>
            </div>
        </div>
    </body>
</html>
