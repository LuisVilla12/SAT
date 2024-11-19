@extends('layout.app')
@section('title')
    Ver visita
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="" method="POST" autocomplete="off" class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Información de la visita</h2>
        
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name_persona" class="block text-gray-600 font-semibold mb-2">Nombre de la persona:</label>
            <input type="text" id="name_persona" name="name_persona" placeholder="Ingrese el nombre de la persona que visita" value="{{ $visita->name_persona}}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
        </div>

        <!-- Empresas -->
        <div class="mb-5">
            <label for="proveedors_id" class="block text-gray-600 font-semibold mb-2">Empresa:</label>
            <select id="proveedors_id" name="proveedors_id" disabled required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
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
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
        </div>

        <div class="mb-5">
            <label for="area" class="block text-gray-600 font-semibold mb-2">Area de visita:</label>
            <select id="area" name="area" required disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" >
                <option value=""  selected>Seleccione una area de visita</option>
                <option  @php echo $visita->area =='ventas' ? 'selected':''; @endphp  value="ventas">Ventas</option>
                <option  @php echo $visita->area =='computacion' ? 'selected':''; @endphp value="computacion">Computación</option>
                <option  @php echo $visita->area =='compras' ? 'selected':''; @endphp value="compras">Compras</option>
                <option  @php echo $visita->area =='administracion' ? 'selected':''; @endphp value="administracion">Administración</option>
            </select>
        </div>

        <!-- Hora de entrada -->
        <div class="mb-6">
            <label for="hora_entrada" class="block text-gray-600 font-semibold mb-2">Hora de entrada:</label>
            <input type="time" id="hora_entrada" min="08:00" max="15:00" value="{{$visita->hora_entrada}}" name="hora_entrada" class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
        </div>

        <!-- Hora de salida -->
        <div class="mb-6">
            <label for="hora_salida" class="block text-gray-600 font-semibold mb-2">Hora de salida:</label>
            <input type="time" id="hora_salida" min="08:00" max="15:00"  name="hora_salida"  value="{{$visita->hora_salida}}"  class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Fecha de registro --}}
        <input type="hidden" id="fecha_visita" name="fecha_visita">

        <!-- Comentarios -->
        <div class="mb-6">
            <label for="comentarios" class="block text-gray-600 font-semibold mb-2">Comentarios:</label>
            <input type="text" id="comentarios" name="comentarios" placeholder="Ingrese un comentario en caso de ser necesario" value="{{$visita->comentarios}}"
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
        </div>

        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('visitas.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
            </a>
            <a href="{{ route('visitas.generarPase',$visita->id) }}" class="bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                Mostrar pase
            </a>
        </div>

    </form>
</div>


@endsection
