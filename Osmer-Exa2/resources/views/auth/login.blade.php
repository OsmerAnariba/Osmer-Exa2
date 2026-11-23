

@extends('layouts.app')

@section('titulo', 'Iniciar sesión')

@section('contenido')
    <div class="login-box">
        <h1 style="color: #FF7238;">{{ config('app.name') }}</h1>
        <h2>Inicia sesión para continuar</h2>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <label for="usuario">Usuario</label>
            <input id="usuario" name="usuario" type="text" value="{{ old('usuario') }}" placeholder="admin" required autofocus>
            @error('usuario')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="password">Contraseña</label>
            <input id="password" name="password" type="password" placeholder="••••••••" required>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror

            <p style="margin-top: 1.4rem;">
                <button type="submit" style="width: 100%; max-width: 460px; padding: 0.7rem;">Entrar</button>
            </p>
        </form>
    </div>
@endsection

