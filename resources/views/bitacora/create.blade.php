@extends('layout.app')
@section('title')
    Registar proveedor
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{route('bitacora.create')}}" method="POST" class="bitacora w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar acceso</h2>
        
        <!-- Seleccionar matricula -->
        <div class="mb-5">
        
            <label for="servicios_id" class="block text-gray-600 font-semibold mb-2">Estudiante:</label>
            <select id="servicios_id" name="servicios_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('proveedors_id') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione un estudiante del servicio social</option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{$estudiante->id}}">{{$estudiante->matricula . "--".$estudiante->name . " ". $estudiante->lastname_p. " ". $estudiante->lastname_m}}</option>
                @endforeach
            </select>
            

                <p class="text-gray-500 mt-1"> ¿No se encuentra registrado? 
                    <a href="{{ route('estudiante.create') }}" class="text-blue-600 font-semibold hover:underline">Registrarlo Ahora</a>
                </p>
        </div>
        
        <div class="mb-6">
            <label for="" class="block text-gray-600 font-semibold mb-2">Fecha de visita:</label>
            <input type="date"  id="fecha_visita" name="fecha_visita" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Hora de entrada -->
        <div class="mb-6">
            <label for="hora_entrada" class="block text-gray-600 font-semibold mb-2">Hora de entrada:</label>
            <input type="time" id="hora_entrada" min="08:00" max="15:00" name="hora_entrada" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
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

        const timeInput = document.getElementById("hora_entrada");
        const now = new Date();

        const currentTime = now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });

    // Asegúrate de que la hora esté dentro del rango permitido (08:00 a 15:00)
    if (currentTime >= "06:00" && currentTime <= "22:00") {
        timeInput.value = currentTime;  // Establece la hora actual si está dentro del rango
    } else {
        timeInput.value = "06:00";  // Si no está dentro del rango, establece 08:00
    }

    // Establecer la fecha actual en el input de fecha
    const fechaRegistroInput = document.getElementById("fecha_visita");
    const hoy = new Date();

    // Formato YYYY-MM-DD
    const año = hoy.getFullYear();
    const mes = String(hoy.getMonth() + 1).padStart(2, '0');  // Los meses van de 0 a 11
    const dia = String(hoy.getDate()).padStart(2, '0');

    const fechaActual = `${año}-${mes}-${dia}`;
    fechaRegistroInput.value = fechaActual; 
    
        const btnRegistrar=document.querySelector('.enviar');
        // console.log(btnRegistrar);
        
        btnRegistrar.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío inmediato del formulario
        Swal.fire({
            title: "¿Seguro que quieres registrar el acceso?",
            showDenyButton: true,
            confirmButtonText: "Registrar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.bitacora').submit();
            } else if (result.isDenied) {
                Swal.fire("No se registró el acceso", "", "info");
            }
        });
    });
    });
   

    // Formato HH:mm
    
    


    
    </script>

