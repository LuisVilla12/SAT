@extends('layout.app')
@section('title')
    Actualizar contraseña
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('auth.edit_password',$usuario) }}" method="POST" autocomplete="off" class="usuario bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Actualizar contraseña</h2>
        <div class="mb-6">
            <input type="hidden" id="id" name="id" value="{{$usuario->id}}"
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
        </div>

        <!-- Contraseña -->
        <div class="mb-6">
            <label for="password" class="block text-gray-600 font-semibold mb-2">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar una contraseña valida.</p>
            @enderror
        </div>

        <!-- Confirmar contraseña -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-600 font-semibold mb-2">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repita su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password_confirmation') border-red-500 @enderror">
                @error('password_confirmation')
                <p class="mx-1 mt-1 text-red-500">Debe ser la misma contraseña.</p>
            @enderror
        </div>
        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('auth.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <input type="submit" value="Guardar" class="enviar bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
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
        // console.log(btnRegistrar);
        
        btnRegistrar.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío inmediato del formulario
        Swal.fire({
            title: "¿Seguro que quieres actualizar la contraseña?",
            showDenyButton: true,
            confirmButtonText: "Actualizar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.usuario').submit();
            } else if (result.isDenied) {
                Swal.fire("No se actualizo la contraseña", "", "info");
            }
        });
    });
    });
</script>

