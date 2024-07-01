<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - ElectroWave</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	
    <link rel="stylesheet" href="css/inicio.css">
</head>

<header>
    <body>
        
    
    <nav class="nav">
    <a href="{{ url('/') }}"  class="nav-brand" >
          <img src="./img/Logo.png" alt=" ">
        </a>
   
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
