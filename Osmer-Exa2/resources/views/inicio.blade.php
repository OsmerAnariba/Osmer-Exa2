

@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Bienvenido, {{ auth()->user()->name }}</h1>
    <p style="color: #9ca3af;">Sesión iniciada correctamente con el usuario <strong style="color: #FF7238;">{{ auth()->user()->usuario }}</strong>.</p>
@endsection