@extends('layout.app')
@section('title')
    Editar Visita
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('visitas.edit',$visita) }}" method="POST" autocomplete="off" class="visitas bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Actualizar salida</h2>
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name_persona" class="block text-gray-600 font-semibold mb-2">Nombre de la persona:</label>
            <input type="text" id="name_persona" name="name_persona" placeholder="Ingrese el nombre de la persona que visita" value="{{ $visita->name_persona}}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
            @error('name_persona')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <!-- Empresas -->
        <div class="mb-5">
            <label for="proveedors_id" class="block text-gray-600 font-semibold mb-2">Empresa:</label>
            <select id="proveedors_id" name="proveedors_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('proveedors_id') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione una empresa</option>
                @foreach ($proveedores as $proveedor)
                    <option @php echo $visita->proveedors_id ==$proveedor->id ? 'selected':''; @endphp value="{{$proveedor->id}}">{{$proveedor->name_company}}</option>
                @endforeach
            </select>
        </div>
    
        <!-- Motivo visita -->
        <div class="mb-6">
            <label for="motivo_visita" class="block text-gray-600 font-semibold mb-2">Motivo de visita:</label>
            <input type="text" id="motivo_visita" name="motivo_visita" placeholder="Ingrese el motivo de visita" value="{{ $visita->motivo_visita}}"
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('motivo_visita') border-red-500 @enderror">
            @error('motivo_visita')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="area" class="block text-gray-600 font-semibold mb-2">Area de visita:</label>
            <select id="area" name="area" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('area') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione una area de visita</option>
                <option  @php echo $visita->area =='ventas' ? 'selected':''; @endphp  value="ventas">Ventas</option>
                <option  @php echo $visita->area =='computacion' ? 'selected':''; @endphp value="computacion">Computación</option>
                <option  @php echo $visita->area =='compras' ? 'selected':''; @endphp value="compras">Compras</option>
                <option  @php echo $visita->area =='administracion' ? 'selected':''; @endphp value="administracion">Administración</option>
            </select>
        </div>
        {{-- Fecha de registro --}}
        <div class="mb-6">
            <label for="fecha_visita" class="block text-gray-600 font-semibold mb-2">Fecha visita:</label>
            <input type="date" id="fecha_visita" name="fecha_visita"  value="{{$visita->fecha_visita}}"  class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Hora de entrada -->
        <div class="mb-6">
            <label for="hora_entrada" class="block text-gray-600 font-semibold mb-2">Hora de entrada:</label>
            <input type="time" id="hora_entrada" value="{{$visita->hora_entrada}}" name="hora_entrada" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <!-- Hora de salida -->
        <div class="mb-6">
            <label for="hora_salida" class="block text-gray-600 font-semibold mb-2">Hora de salida:</label>
            <input type="time" id="hora_salida" min="08:00" max="15:00"  name="hora_salida" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>


        <!-- Comentarios -->
        <div class="mb-6">
            <label for="comentarios" class="block text-gray-600 font-semibold mb-2">Comentarios:</label>
            <input type="text" id="comentarios" name="comentarios" placeholder="Ingrese un comentario en caso de ser necesario" value="{{old($visita->comentarios)}}"
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('comentarios') border-red-500 @enderror">
            @error('comentarios')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('visitas.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <input type="submit" value="Actualizar" class="enviar bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
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
    const timeInput = document.getElementById("hora_salida");
    const now = new Date();
    // Formato HH:mm
    const currentTime = now.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
    // Asegúrate de que la hora esté dentro del rango permitido (08:00 a 15:00)
    if (currentTime >= "06:00" && currentTime <= "22:00") {
        timeInput.value = currentTime;  // Establece la hora actual si está dentro del rango
    } else {
        timeInput.value = "06:00";  // Si no está dentro del rango, establece 08:00
    }
    btnRegistrar.addEventListener('click',(e)=>{
        e.preventDefault();
        Swal.fire({
            title: "¿Seguro que quieres actualizar la visita?",
            showDenyButton: true,
            confirmButtonText: "Actualizar",
            denyButtonText: `Cancelar`
        }).then((result) => {
        if (result.isConfirmed) {
            // Envía el formulario de forma tradicional
            document.querySelector('.visitas').submit();
        } else if (result.isDenied) {
            Swal.fire("No se registró la visita", "", "info");
        }
    });
    })
});

</script>
{{-- btnRegistrar.addEventListener('click', (e) => {
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
    }); --}}