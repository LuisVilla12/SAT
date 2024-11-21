@extends('layout.app')
@section('title')
    Registrar Visita
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('visitas.create') }}" method="POST" autocomplete="off" class="visitas bg-white shadow-lg rounded-lg w-full max-w-xl p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar visita</h2>
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name_persona" class="block text-gray-600 font-semibold mb-2">Nombre de la persona:</label>
            <input type="text" id="name_persona" name="name_persona" placeholder="Ingrese el nombre de la persona que visita" value="{{ old('name_persona') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
            @error('name_persona')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de persona valido</p>
            @enderror
        </div>
        <!-- Empresas -->
        <div class="">
            <label for="proveedors_id" class="block text-gray-600 font-semibold mb-2">Empresa:</label>
            <select id="proveedors_id" name="proveedors_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('proveedors_id') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione una empresa</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->name_company}}</option>
                @endforeach
            </select>
        </div>
        <p class="text-gray-500 mt-1"> ¿No se encuentra registrado el proveedor? 
            <a href="{{ route('proveedor.create') }}" class="text-blue-600 font-semibold hover:underline">Regístrese Ahora</a>
        </p>
        <div class="mb-6"></div>
    
        <!-- Apellido Materno -->
        <div class="mb-6">
            <label for="motivo_visita" class="block text-gray-600 font-semibold mb-2">Motivo de visita:</label>
            <input type="text" id="motivo_visita" name="motivo_visita" placeholder="Ingrese el motivo de visita" value="{{ old('motivo_visita') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameM') border-red-500 @enderror">
            @error('motivo_visita')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un motivo de visita valido</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="area" class="block text-gray-600 font-semibold mb-2">Area de visita:</label>
            <select id="area" name="area" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('area') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione una area de visita</option>
                <option value="ventas">Ventas</option>
                <option value="computacion">Computación</option>
                <option value="compras">Compras</option>
                <option value="administracion">Administración</option>
            </select>
        </div>

        <!-- Hora de entrada -->
        <div class="mb-6">
            <label for="hora_entrada" class="block text-gray-600 font-semibold mb-2">Hora de entrada:</label>
            <input type="time" id="hora_entrada" min="08:00" max="15:00" name="hora_entrada" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        {{-- Fecha de registro --}}
        <input type="hidden" id="fecha_visita" name="fecha_visita">


        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
            </a>
            <input type="submit" value="Registrar" class="enviar bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
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
        title: "¿Seguro que quieres registrar la visita?",
        showDenyButton: true,
        confirmButtonText: "Registrar",
        denyButtonText: `Cancelar`
    }).then((result) => {
        if (result.isConfirmed) {
            // Envía el formulario de forma tradicional
            document.querySelector('.visitas').submit();
        } else if (result.isDenied) {
            Swal.fire("No se registró la visita", "", "info");
        }
    });
});


    const timeInput = document.getElementById("hora_entrada");
    const now = new Date();

    // Formato HH:mm
    const currentTime = now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });

    // Asegúrate de que la hora esté dentro del rango permitido (08:00 a 15:00)
    if (currentTime >= "08:00" && currentTime <= "16:00") {
        timeInput.value = currentTime;  // Establece la hora actual si está dentro del rango
    } else {
        timeInput.value = "08:00";  // Si no está dentro del rango, establece 08:00
    }

    // Establecer la fecha actual en el input de fecha
    const fechaRegistroInput = document.getElementById("fecha_visita");
    const hoy = new Date();

    // Formato YYYY-MM-DD
    const año = hoy.getFullYear();
    const mes = String(hoy.getMonth() + 1).padStart(2, '0');  // Los meses van de 0 a 11
    const dia = String(hoy.getDate()).padStart(2, '0');

    const fechaActual = `${año}-${mes}-${dia}`;
    fechaRegistroInput.value = fechaActual;  // Establecer la fecha en el input
});



</script>