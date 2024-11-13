@extends('layout.app')
@section('title')
    Registar proveedor
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="/registro-proveedor" method="POST" class="w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar proveedor</h2>
        
        <!-- Nombre de la persona -->
        <div class="mb-5">
            <label for="nombrePersona" class="block text-gray-600 font-semibold mb-2">Nombre de la persona:</label>
            <input type="text" id="nombrePersona" name="nombrePersona" required placeholder="Ingrese el nombre de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        
        <!-- Nombre de la empresa -->
        <div class="mb-5">
            <label for="nombreEmpresa" class="block text-gray-600 font-semibold mb-2">Nombre de la empresa:</label>
            <input type="text" id="nombreEmpresa" name="nombreEmpresa" required placeholder="Ingrese el nombre de la empresa" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        
        <!-- Área -->
        <div class="mb-5">
            <label for="area" class="block text-gray-600 font-semibold mb-2">Área:</label>
            <select id="area" name="area" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="" disabled selected>Seleccione un área</option>
                <option value="ventas">Ventas</option>
                <option value="logistica">Logística</option>
                <option value="compras">Compras</option>
                <option value="administracion">Administración</option>
            </select>
        </div>
        
        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
            </a>
            <a class="bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                Registrar
            </a>
        </div>
    </form>
</div>
@endsection