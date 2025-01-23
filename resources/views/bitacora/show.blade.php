@extends('layout.app')
@section('title')
    Visualización de checada 
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('bitacora.edit',$registro) }}" method="POST" class="bitacora w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Visualización de checada</h2>
        <!-- Matricula -->
        <div class="mb-5">
            <label for="servicios_id" class="block text-gray-600 font-semibold mb-2">Estudiante:</label>
            <select id="servicios_id" name="servicios_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('proveedors_id') border-solid border-2 border-red-500  @enderror">
                @foreach ($estudiantes as $estudiante)
                    <option selected disabled value="{{$estudiante->id}}">{{$estudiante->matricula . "--".$estudiante->name . " ". $estudiante->lastname_p. " ". $estudiante->lastname_m}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-6">
            <label for="fecha_visita" class="block text-gray-600 font-semibold mb-2">Fecha de visita:</label>
            <input type="date" disabled value="{{$registro->fecha_visita}}"  id="fecha_visita" name="fecha_visita" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Hora de entrada -->
        <div class="mb-6">
            <label for="hora_entrada"  class="block text-gray-600 font-semibold mb-2">Hora de entrada:</label>
            <input type="time" disabled id="hora_entrada" min="08:00" max="15:00" value="{{$registro->hora_entrada}}" name="hora_entrada" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Hora de salida -->
        <div class="mb-6">
            <label for="hora_salida" class="block text-gray-600 font-semibold mb-2">Hora de salida:</label>
            <input type="time" disabled value="{{$registro->hora_salida}}" id="hora_salida" min="08:00" max="15:00" name="hora_salida" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Botón de Enviar -->
        <div class="flex justify-evenly gap-5 mt-10">
            <a href="{{ route('bitacora.index') }}" class="flex gap-3 bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt=""> Regresar
            </a>
        </div>
    </form>
</div>
@endsection

@stack('scripts')
<script src="https://kit.fontawesome.com/aaef00cbdd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnRegistrar=document.querySelector('.enviar');
        btnRegistrar.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío inmediato del formulario
        Swal.fire({
            title: "¿Seguro que quieres registar esta salida?",
            showDenyButton: true,
            confirmButtonText: "Guardar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.bitacora').submit();
            } else if (result.isDenied) {
                Swal.fire("No se registro esta salida", "", "info");
            }
        });
    });
    });
</script>
