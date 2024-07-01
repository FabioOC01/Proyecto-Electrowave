@extends('layouts.app')

@section('title', 'Seguimiento')

@section('content')
<style>
    body {
      background-color: #000; 
      color: #fff; 
    }
    .table {
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
<div class="container">
    <h1 class="display-4">Seguimiento de Pedidos</h1>

    @if(Auth::user()->role === 'admin')
    <a href="{{ route('service_requests.create') }}" class="btn btn-primary mb-3">Nuevo Pedido</a>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dispositivo</th>
                <th>Modelo</th>
                <th>Tipo de Servicio</th>
                <th>Descripción del Problema</th>
                <th>Metodo de Pago</th>
                <th>Usuario</th> 
                @if(Auth::user()->role === 'admin')
                <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->device }}</td>
                <td>{{ $request->model }}</td>
                <td>{{ $request->service_type }}</td>
                <td>{{ $request->problem_description }}</td>
                <td>{{ $request->payment_method }}</td>
                <td>{{ $request->user->name }}</td> <!-- Muestra el nombre del usuario -->
                @if(Auth::user()->role === 'admin')
                <td>
                    <a href="{{ route('service_requests.show', $request->id) }}" class="btn btn-secondary btn-sm">Ver</a>
                    <a href="{{ route('service_requests.edit', $request->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('service_requests.destroy', $request->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

