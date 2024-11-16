@extends('layout.app')
@section('title')
    Iniciar sesión
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form method="POST" action="{{ route('login') }}" novalidate class="px-10 py-8 bg-white shadow-lg rounded-lg w-full max-w-lg">
        @csrf
        <h1 class="text-center text-black-600 font-bold  text-4xl mb-8 mt-2">Login </h1>
        
        <!-- Correo electrónico -->
        <div class="mb-6">
            <label for="email" class="font-semibold  text-gray-600 uppercase block mb-2 mt-5">Correo Electrónico:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese su correo electrónico" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Contraseña -->
        <div class="mb-6">
            <label for="password" class="font-semibold text-gray-600 uppercase block mb-2">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Mensaje de error de sesión -->
        @if (session('mensaje'))
            <p class="mb-5 bg-red-500 text-white text-center font-semibold rounded-lg p-2">{{ session('mensaje') }}</p>
        @endif

        <!-- Mantener sesión abierta -->
        <div class="mb-6 flex items-center">
            <input type="checkbox" name="remember" id="sesion" class="mr-2">
            <label for="sesion" class="text-gray-500">Mantener la sesión abierta</label>
        </div>

        <!-- Enlace para registro -->
        {{-- <p class="my-8 text-center text-gray-500">
            ¿No tiene una cuenta? 
            <a href="{{ route('register.create') }}" class="text-blue-600 font-semibold hover:underline">Regístrese Ahora</a>
        </p> --}}
        
        <!-- Botón de inicio de sesión -->
        <div class="grid place-items-center mt-8">
            <button type="submit" class="font-bold bg-blue-700 text-white py-4 px-10 shadow-md hover:bg-blue-700 transition duration-300 ease-in-out cursor-pointer rounded-md">
                Iniciar sesión
            </button>
        </div>
    </form>
</div>

    @endsection