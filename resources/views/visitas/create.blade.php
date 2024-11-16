@extends('layout.app')
@section('title')
    Registrar Visita
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('register.create') }}" method="POST" autocomplete="off" class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar visita</h2>
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name" class="block text-gray-600 font-semibold mb-2">Nombre de la persona:</label>
            <input type="text" id="name" name="name" placeholder="Ingrese el nombre de la persona que visita" value="{{ old('name') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <!-- Empresas -->
        <div class="mb-5">
            <label for="type" class="block text-gray-600 font-semibold mb-2">Empresa:</label>
            <select id="type" name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione una empresa</option>
                @foreach ($proveedores as $proveedor)
                    <option value="ventas">{{$proveedor->name_company}}</option>
                @endforeach
            </select>
        </div>
    
        <!-- Apellido Materno -->
        <div class="mb-6">
            <label for="lastnameM" class="block text-gray-600 font-semibold mb-2">Motivo de visita:</label>
            <input type="text" id="lastnameM" name="lastnameM" placeholder="Ingrese el motivo de visita" value="{{ old('lastnameM') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameM') border-red-500 @enderror">
            @error('lastnameM')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="type" class="block text-gray-600 font-semibold mb-2">Area de visita:</label>
            <select id="type" name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione una empresa</option>
                <option value="ventas">Ventas</option>
                <option value="computacion">Computación</option>
                <option value="compras">Compras</option>
                <option value="administracion">Administración</option>
            </select>
        </div>

        <!-- Contraseña -->
        <div class="mb-6">
            <label for="password" class="block text-gray-600 font-semibold mb-2">Hora de entrada:</label>
            <input type="time" id="password" name="password" placeholder="Ingrese su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

    
        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
            </a>
            <input type="submit" value="Registrar" class="bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
        </div>
    </form>
</div>


@endsection