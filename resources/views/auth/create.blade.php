@extends('layout.app')
@section('title')
    Registarse
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('register.create') }}" method="POST" autocomplete="off" class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h1 class="text-center text-blue-600 font-bold uppercase text-3xl mb-8">Registrar Cuenta</h1>
        
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name" class="font-semibold text-gray-600 uppercase block mb-2">Nombre:</label>
            <input type="text" id="name" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Apellido Paterno -->
        <div class="mb-6">
            <label for="lastnameP" class="font-semibold text-gray-600 uppercase block mb-2">Apellido Paterno:</label>
            <input type="text" id="lastnameP" name="lastnameP" placeholder="Ingrese su apellido paterno" value="{{ old('lastnameP') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameP') border-red-500 @enderror">
            @error('lastnameP')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Apellido Materno -->
        <div class="mb-6">
            <label for="lastnameM" class="font-semibold text-gray-600 uppercase block mb-2">Apellido Materno:</label>
            <input type="text" id="lastnameM" name="lastnameM" placeholder="Ingrese su apellido materno" value="{{ old('lastnameM') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameM') border-red-500 @enderror">
            @error('lastnameM')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Correo electrónico -->
        <div class="mb-6">
            <label for="email" class="font-semibold text-gray-600 uppercase block mb-2">Correo Electrónico:</label>
            <input type="text" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}" 
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

        <!-- Confirmar contraseña -->
        <div class="mb-6">
            <label for="password_confirmation" class="font-semibold text-gray-600 uppercase block mb-2">Repetir Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repita su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password_confirmation') border-red-500 @enderror">
            @error('password_confirmation')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón de Registro -->
        <div class="grid place-items-center mt-8">
            <button type="submit" class="uppercase font-bold bg-blue-600 text-white py-3 px-10 rounded-full shadow-md hover:bg-blue-700 transition duration-300 ease-in-out cursor-pointer">
                Registrar Cuenta
            </button>
        </div>
    </form>
</div>


@endsection