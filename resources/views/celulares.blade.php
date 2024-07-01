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
<div class="container">
    <h1>Celulares</h1>
    <p>Contenido sobre celulares.</p>
</div>

