@extends('layouts.app')

@section('title', 'Usuarios')

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
  </style>
<div class="container">
    <h1 class="display-4">Users</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electronico</th>
                <th>Celular</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
