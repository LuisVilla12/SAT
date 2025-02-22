@extends('layout.app')
@section('title')
    Editar proveedor
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('estudiante.edit',$estudiante) }}" method="POST" class="estudiante w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Editar estudiante del servicio social</h2>
        <div class="mb-5">
            <label for="matricula" class="block text-gray-600 font-semibold mb-2">Matricula:</label>
            <input type="text" id="matricula" name="matricula" required placeholder="Ingrese la matricula" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('matricula') border-solid border-2 border-red-500 @enderror" value="{{ $estudiante->matricula }}">
                @error('matricula')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar una matricula valida.</p>
                @enderror
        </div>        
        <!-- Nombre de la persona -->
        <div class="mb-5">
            <label for="name" class="block text-gray-600 font-semibold mb-2">Nombre:</label>
            <input type="text" id="name" name="name" required placeholder="Ingrese el nombre de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('name') border-solid border-2 border-red-500 @enderror" value="{{ $estudiante->name }}">
                @error('name')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre valido.</p>
                @enderror
        </div>
        <!-- Apellido Paterno -->
        <div class="mb-5">
            <label for="lastname_p" class="block text-gray-600 font-semibold mb-2">Apellido paterno:</label>
            <input type="text" id="lastname_p" name="lastname_p" required placeholder="Ingrese el apellido paterno de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('lastname_p') border-solid border-2 border-red-500 @enderror" value="{{ $estudiante->lastname_p }}">
                @error('lastname_p')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido paterno valido.</p>
                @enderror
        </div>
        <div class="mb-5">
            <label for="lastname_m" class="block text-gray-600 font-semibold mb-2">Apellido materno:</label>
            <input type="text" id="lastname_m" name="lastname_m" required placeholder="Ingrese el apellido materno de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('lastname_m') border-solid border-2 border-red-500 @enderror" value="{{ $estudiante->lastname_m }}">
                @error('lastname_m')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido materno valido.</p>
                @enderror
        </div>
        <!-- Nombre de la empresa -->
        <div class="mb-5">
            <label for="company" class="block text-gray-600 font-semibold mb-2">Nombre de la institución:</label>
            <input type="text" id="company" name="company" required placeholder="Ingrese el nombre de la institución" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('company') border-solid border-2 border-red-500 @enderror" value="{{ $estudiante->company }}">
                @error('company')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de un instituto valido.</p>
                @enderror
        </div>
        <div class="mb-5">
            <label for="mesInicio" class="block text-gray-600 font-semibold mb-2">Inicio del periodo:</label>
            <select id="mesInicio" name="mesInicio" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione el inicio del periodo</option>
                <option @php echo $estudiante->mesInicio =='enero' ? 'selected':''; @endphp value="1">Enero</option>
                <option @php echo $estudiante->mesInicio =='febrero' ? 'selected':''; @endphp value="2">Febrero</option>
                <option @php echo $estudiante->mesInicio =='marzo' ? 'selected':''; @endphp value="3">Marzo</option>
                <option @php echo $estudiante->mesInicio =='abril' ? 'selected':''; @endphp value="4">Abril</option>
                <option @php echo $estudiante->mesInicio =='mayo' ? 'selected':''; @endphp value="5">Mayo</option>
                <option @php echo $estudiante->mesInicio =='junio' ? 'selected':''; @endphp value="6">Junio</option>
                <option @php echo $estudiante->mesInicio =='julio' ? 'selected':''; @endphp value="7">Julio</option>
                <option @php echo $estudiante->mesInicio =='agosto' ? 'selected':''; @endphp value="8">Agosto</option>
                <option @php echo $estudiante->mesInicio =='septiembre' ? 'selected':''; @endphp value="9">Septiembre</option>
                <option @php echo $estudiante->mesInicio =='octubre' ? 'selected':''; @endphp value="10">Octubre</option>
                <option @php echo $estudiante->mesInicio =='noviembre' ? 'selected':''; @endphp value="11">Noviembre</option>
                <option @php echo $estudiante->mesInicio =='diciembre' ? 'selected':''; @endphp value="12">Diciembre</option>
            </select>
            @error('mesInicio')
            <p class="mx-1 mt-1 text-red-500">Debes seleccionar un mes de inicio de periodo.</p>
        @enderror
        </div>
        <!-- Estado -->
        <div class="mb-5">
            <label for="state" class="block text-gray-600 font-semibold mb-2">Estado del estudiante:</label>
            <select id="state" name="state" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione un estado</option>
                <option @php echo $estudiante->state =='1' ? 'selected':''; @endphp value="1">Activo</option>
                <option @php echo $estudiante->state =='2' ? 'selected':''; @endphp value="2">Inactivo</option>
            </select>
        </div>
        
        <!-- Botón de Enviar -->
        <div class="flex justify-evenly gap-5 mt-10">
            <a href="{{ route('estudiante.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <input type="submit" value="Actualizar" class="enviar bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
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
        console.log(btnRegistrar);
        
        btnRegistrar.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío inmediato del formulario
        Swal.fire({
            title: "¿Seguro que quieres actualizar este estudiante?",
            showDenyButton: true,
            confirmButtonText: "Actualizar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.estudiante').submit();
            } else if (result.isDenied) {
                Swal.fire("No se actualizo este estudiante", "", "info");
            }
        });
    });
    });
</script>
