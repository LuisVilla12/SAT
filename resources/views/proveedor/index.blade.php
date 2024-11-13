@extends('layout.app')
@section('title')
    Consulta de proveedores
@endsection

@section('contenido')

<div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-4xl bg-white p-14 shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Todos los proveedores</h2>

        <table class="min-w-full bg-white">
            <!-- Cabecera de la tabla -->
            <thead>
                <tr class="bg-blue-600 text-white text-left">
                    <th class="py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Nombre Responsable</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Nombre Empresa</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Editar</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Eliminar</th>
                </tr>
            </thead>
            
            <!-- Cuerpo de la tabla -->
            <tbody class="text-gray-700 text-center">
                <!-- Ejemplo de una fila de datos -->
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150">
                    <td class="py-4 px-4">1</td>
                    <td class="py-4 px-4">Juan Pérez</td>
                    <td class="py-4 px-4">Empresa ABC</td>
                    <td class="py-4 px-4">
                        <button class="bg-yellow-400 text-white font-bold py-1 px-3 rounded-full hover:bg-yellow-500 transition duration-200">
                            Editar
                        </button>
                    </td>
                    <td class="py-4 px-4">
                        <button class="bg-red-500 text-white font-bold py-1 px-3 rounded-full hover:bg-red-600 transition duration-200">
                            Eliminar
                        </button>
                    </td>
                </tr>

                <!-- Más filas de datos -->
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150">
                    <td class="py-4 px-4">2</td>
                    <td class="py-4 px-4">Ana García</td>
                    <td class="py-4 px-4">Empresa XYZ</td>
                    <td class="py-4 px-4">
                        <button class="bg-yellow-400 text-white font-bold py-1 px-3 rounded-full hover:bg-yellow-500 transition duration-200">
                            Editar
                        </button>
                    </td>
                    <td class="py-4 px-4">
                        <button class="bg-red-500 text-white font-bold py-1 px-3 rounded-full hover:bg-red-600 transition duration-200">
                            Eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-center gap-5 mt-7">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
            </a>
            <a class="bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                Registrar
            </a>
        </div>
    </div>
</div>

@endsection