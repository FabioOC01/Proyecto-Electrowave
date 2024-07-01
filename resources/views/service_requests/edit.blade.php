@extends('layouts.app')

@section('title', 'Editar')

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
    <h1 class="display-4">Editar Pedidos</h1>
    <br>

    <form action="{{ route('service_requests.update', $request->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="device">Dispositivo</label>
            <select class="form-control" name="device" id="device" required>
                <option value="">Dispositivo</option>
                <option value="Computadora" {{ $request->device === 'Computadora' ? 'selected' : '' }}>Computadora</option>
                <option value="Celular" {{ $request->device === 'Celular' ? 'selected' : '' }}>Celular</option>
            </select>
        </div>
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" name="model" class="form-control" id="model" value="{{ $request->model }}" required>
        </div>
        <div class="form-group">
            <label for="service_type">Servicio</label>
            <select class="form-control" name="service_type" id="service_type" required>
                <option value="">Seleccionar Servicio</option>
                @if($request->device === 'Computadora')
                    <option value="Instalación de Componente" {{ $request->service_type === 'Instalación de Componente' ? 'selected' : '' }}>Instalación de Componente</option>
                    <option value="Diagnostico Completo" {{ $request->service_type === 'Diagnostico Completo' ? 'selected' : '' }}>Diagnostico Completo</option>
                    <option value="Limpieza" {{ $request->service_type === 'Limpieza' ? 'selected' : '' }}>Limpieza</option>
                @elseif($request->device === 'Celular')
                    <option value="Cambio de Bateria" {{ $request->service_type === 'Cambio de Bateria' ? 'selected' : '' }}>Cambio de Bateria</option>
                    <option value="Cambio de Pantalla" {{ $request->service_type === 'Cambio de Pantalla' ? 'selected' : '' }}>Cambio de Pantalla</option>
                    <option value="Reparación" {{ $request->service_type === 'Reparación' ? 'selected' : '' }}>Reparación</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="problem_description">Descripción del Problema</label>
            <textarea name="problem_description" class="form-control" id="problem_description" required>{{ $request->problem_description }}</textarea>
        </div>
        <div class="form-group">
            <label for="payment_method">Metodo de Pago</label>
            <select class="form-control" name="payment_method" id="payment_method" required>
                <option value="">Seleccionar Metodo de Pago</option>
                <option value="Billetera Electronica" {{ $request->payment_method === 'Billetera Electronica' ? 'selected' : '' }}>Billetera Electronica</option>
                <option value="Efectivo" {{ $request->payment_method === 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deviceSelect = document.getElementById('device');
    const serviceTypeSelect = document.getElementById('service_type');

    deviceSelect.addEventListener('change', function () {
        const device = deviceSelect.value;
        serviceTypeSelect.innerHTML = '<option value="">Select Service Type</option>';

        let options = [];
        if (device === 'Computadora') {
            options = [
                { value: 'Instalación de Componente', text: 'Instalación de Componente' },
                { value: 'Diagnostico Completo', text: 'Diagnostico Completo' },
                { value: 'Limpieza', text: 'Limpieza' },
            ];
        } else if (device === 'Celular') {
            options = [
                { value: 'Cambio de Bateria', text: 'Cambio de Bateria' },
                { value: 'Cambio de Pantalla', text: 'Cambio de Pantalla' },
                { value: 'Reparación', text: 'Reparación' },
            ];
        }

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option.value;
            opt.textContent = option.text;
            serviceTypeSelect.appendChild(opt);
        });

        // Reset the service type if the selected device is different
        serviceTypeSelect.value = '{{ $request->service_type }}';
    });
});
</script>
@endsection
