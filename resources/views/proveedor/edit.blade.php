@extends('layout.app')
@section('title')
    Editar proveedor
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('proveedor.edit',$proveedor) }}" method="POST" class="proveedor w-full max-w-lg bg-white p-8 shadow-md rounded-lg">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Editar proveedor</h2>
        
        <!-- Nombre de la persona -->
        <div class="mb-5">
            <label for="name_persona" class="block text-gray-600 font-semibold mb-2">Nombre de la persona:</label>
            <input type="text" id="name_persona" name="name_persona" required placeholder="Ingrese el nombre de la persona" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('name_persona') border-solid border-2 border-red-500 @enderror" value="{{ $proveedor->name_persona}}">
                @error('name_persona')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de persona valido</p>
                @enderror
        </div>
        
        <!-- Nombre de la empresa -->
        <div class="mb-5">
            <label for="name_company" class="block text-gray-600 font-semibold mb-2">Nombre de la empresa:</label>
            <input type="text" id="name_company" name="name_company" required placeholder="Ingrese el nombre de la empresa" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500  @error('name_company') border-solid border-2 border-red-500 @enderror" value="{{ $proveedor->name_company}}">
                @error('name_company')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de empresa valido</p>
                @enderror
            </div>
        
        <!-- Área -->
        <div class="mb-5">
            <label for="type" class="block text-gray-600 font-semibold mb-2">Área:</label>
            <select id="type" name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione un área</option>
                <option @php echo $proveedor->type =='ventas' ? 'selected':''; @endphp value="ventas">Ventas</option>
                <option @php echo $proveedor->type =='computacion' ? 'selected':''; @endphp value="computacion">Computación</option>
                <option @php echo $proveedor->type =='compras' ? 'selected':''; @endphp value="compras">Compras</option>
                <option @php echo $proveedor->type =='administracion' ? 'selected':''; @endphp value="administracion">Administración</option>
            </select>
        </div>

        <!-- Estado -->
        <div class="mb-5">
            <label for="state" class="block text-gray-600 font-semibold mb-2">Estatus:</label>
            <select id="state" name="state" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione un estado</option>
                <option @php echo $proveedor->state =='1' ? 'selected':''; @endphp value="1">Activo</option>
                <option @php echo $proveedor->state =='2' ? 'selected':''; @endphp value="2">Inactivo</option>
            </select>
        </div>
        
        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('proveedor.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
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
        console.log(btnRegistrar);
        
        btnRegistrar.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío inmediato del formulario
        Swal.fire({
            title: "¿Seguro que quieres actualizar el proveedor?",
            showDenyButton: true,
            confirmButtonText: "Actualizar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.proveedor').submit();
            } else if (result.isDenied) {
                Swal.fire("No se actualizo el proveedor", "", "info");
            }
        });
    });
    });
</script>
