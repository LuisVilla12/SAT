@extends('layout.app')
@section('title')
    Registar proveedor
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{route('proveedor.create')}}" method="POST" class="w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar proveedor</h2>
        
        <!-- Nombre de la persona -->
        <div class="mb-5">
            <label for="name_persona" class="block text-gray-600 font-semibold mb-2">Nombre de la persona:</label>
            <input type="text" id="name_persona" name="name_persona" required placeholder="Ingrese el nombre de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('name_persona') border-solid border-2 border-red-500 @enderror" value="{{ old('name_persona') }}">
                @error('name_persona')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de persona valido</p>
                @enderror
        </div>
        
        <!-- Nombre de la empresa -->
        <div class="mb-5">
            <label for="name_company" class="block text-gray-600 font-semibold mb-2">Nombre de la empresa:</label>
            <input type="text" id="name_company" name="name_company" required placeholder="Ingrese el nombre de la empresa" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('name_company') border-solid border-2 border-red-500 @enderror" value="{{ old('name_company') }}">
                @error('name_company')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de empresa valido</p>
                @enderror
            </div>
        
        <!-- Área -->
        <div class="mb-5">
            <label for="type" class="block text-gray-600 font-semibold mb-2">Área:</label>
            <select id="type" name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione un área</option>
                <option value="ventas">Ventas</option>
                <option value="computacion">Computación</option>
                <option value="compras">Compras</option>
                <option value="administracion">Administración</option>
            </select>
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