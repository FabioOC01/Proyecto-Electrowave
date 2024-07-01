@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
      background-color: #000; 
      color: #fff; 
    }
    .card {
      background-color: #1a1a1a; 
      color: #fff; 
      border: none;
      border-radius: 10px;
    }
    .card-header {
      background-color: #333; 
      border-bottom: 1px solid #444;
    }
    .form-control {
      background-color: #333;
      border: 1px solid #555;
      color: #fff;
      box-shadow: none; 
    }
    .form-check-label {
      color: #ccc; 
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
   
  
  </style>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-5">
          <div class="card-header">{{ __('Login') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('Recuérdame') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-link">{{ __('¿Eres Nuevo? Regístrate') }}</a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
