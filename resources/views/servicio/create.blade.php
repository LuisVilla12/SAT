@extends('layout.app')
@section('title')
    Registar proveedor
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{route('estudiante.create')}}" method="POST" class="proveedor w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar estudiante del servicio social</h2>
        <!-- Matricula -->
        <div class="mb-5">
            <label for="matricula" class="block text-gray-600 font-semibold mb-2">Matricula:</label>
            <input type="text" id="matricula" name="matricula" required placeholder="Ingrese la matricula" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('matricula') border-solid border-2 border-red-500 @enderror" value="{{ old('matricula') }}">
                @error('matricula')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar una matricula valida.</p>
                @enderror
        </div>        
        <!-- Nombre de la persona -->
        <div class="mb-5">
            <label for="name" class="block text-gray-600 font-semibold mb-2">Nombre:</label>
            <input type="text" id="name" name="name" required placeholder="Ingrese el nombre de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('name') border-solid border-2 border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre valido.</p>
                @enderror
        </div>
        <!-- Apellido Paterno -->
        <div class="mb-5">
            <label for="lastname_p" class="block text-gray-600 font-semibold mb-2">Apellido paterno:</label>
            <input type="text" id="lastname_p" name="lastname_p" required placeholder="Ingrese el apellido paterno de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('lastname_p') border-solid border-2 border-red-500 @enderror" value="{{ old('lastname_p') }}">
                @error('lastname_p')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido paterno valido.</p>
                @enderror
        </div>
        <div class="mb-5">
            <label for="lastname_m" class="block text-gray-600 font-semibold mb-2">Apellido materno:</label>
            <input type="text" id="lastname_m" name="lastname_m" required placeholder="Ingrese el apellido materno de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('lastname_m') border-solid border-2 border-red-500 @enderror" value="{{ old('lastname_m') }}">
                @error('lastname_m')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido materno valido.</p>
                @enderror
        </div>
        <!-- Nombre del instituto -->
        <div class="mb-5">
            <label for="company" class="block text-gray-600 font-semibold mb-2">Nombre de la institución:</label>
            <input type="text" id="company" name="company" required placeholder="Ingrese el nombre de la institución" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('company') border-solid border-2 border-red-500 @enderror" value="{{ old('company') }}">
                @error('company')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de un instituto valido.</p>
                @enderror
        </div>
        {{-- Inicio del periodo --}}
        <div class="mb-5">
            <label for="mesInicio" class="block text-gray-600 font-semibold mb-2">Inicio del periodo:</label>
            <select id="mesInicio" name="mesInicio" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione el inicio del periodo</option>
                <option value="enero">Enero</option>
                <option value="febrero">Febrero</option>
                <option value="marzo">Marzo</option>
                <option value="abri">Abril</option>
                <option value="mayo">Mayo</option>
                <option value="junio">Junio</option>
                <option value="julio">Julio</option>
                <option value="agosto">Agosto</option>
                <option value="septiembre">Septiembre</option>
                <option value="octubre">Octubre</option>
                <option value="noviembre">Noviembre</option>
                <option value="diciembre">Diciembre</option>
            </select>
            @error('mesInicio')
            <p class="mx-1 mt-1 text-red-500">Debes seleccionar un mes de inicio de periodo.</p>
        @enderror
        </div>
        <!-- Botón de Enviar -->
        <div class="flex justify-evenly gap-5 mt-10">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <input type="submit"  value="Registrar" class="enviar bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
        </div>
        {{-- <a href="{{ route('admin.index') }}" class="inline-block bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5 px-6  rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a> --}}
        
    </form>
</div>
@endsection
@stack('scripts')
<script src="https://kit.fontawesome.com/aaef00cbdd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnRegistrar=document.querySelector('.enviar');
        // console.log(btnRegistrar);
        
        btnRegistrar.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío inmediato del formulario
        Swal.fire({
            title: "¿Seguro que quieres registrar este nuevo estudiante?",
            showDenyButton: true,
            confirmButtonText: "Registrar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.proveedor').submit();
            } else if (result.isDenied) {
                Swal.fire("No se registró el estudiante", "", "info");
            }
        });
    });
    });
    
    
    
    </script>

