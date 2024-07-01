@extends('layouts.app')

@section('title', 'Registro')

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
<div class="container">
    <h1 class="my-4">Detalles del Pedido</h1>
    <p><strong>Dispositivo:</strong> {{ $serviceRequest->device }}</p>
    <p><strong>Modelo:</strong> {{ $serviceRequest->model }}</p>
    <p><strong>Servicio:</strong> {{ $serviceRequest->service_type }}</p>
    <p><strong>Descripción del Problema:</strong> {{ $serviceRequest->problem_description }}</p>
    <p><strong>Metodo de Pago:</strong> {{ $serviceRequest->payment_method }}</p>
    <p><strong>Registrado por:</strong> {{ $serviceRequest->user->name }}</p>
    <p><strong>Celular del Usuario:</strong> {{ $serviceRequest->user->phone }}</p> <!-- Añadido el número de celular del usuario -->
    <a href="{{ route('service_requests.index') }}" class="btn btn-primary">Regresar</a>
</div>
@endsection
