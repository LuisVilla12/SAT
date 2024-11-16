@extends('layout.app')
@section('title')
    Registar usuario
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('register.create') }}" method="POST" autocomplete="off" class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar usuario</h2>
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name" class="block text-gray-600 font-semibold mb-2">Nombre(s):</label>
            <input type="text" id="name" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Apellido Paterno -->
        <div class="mb-6">
            <label for="lastnameP" class="block text-gray-600 font-semibold mb-2">Apellido paterno:</label>
            <input type="text" id="lastnameP" name="lastnameP" placeholder="Ingrese su apellido paterno" value="{{ old('lastnameP') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameP') border-red-500 @enderror">
            @error('lastnameP')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

    
        <!-- Apellido Materno -->
        <div class="mb-6">
            <label for="lastnameM" class="block text-gray-600 font-semibold mb-2">Apellido materno:</label>
            <input type="text" id="lastnameM" name="lastnameM" placeholder="Ingrese su apellido materno" value="{{ old('lastnameM') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameM') border-red-500 @enderror">
            @error('lastnameM')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Correo electrónico -->
        <div class="mb-6">
            <label for="email" class="block text-gray-600 font-semibold mb-2">Correo electronico:</label>
            <input type="text" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="mb-6">
            <label for="password" class="block text-gray-600 font-semibold mb-2">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirmar contraseña -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-600 font-semibold mb-2">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repita su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password_confirmation') border-red-500 @enderror">
            @error('password_confirmation')
                <p class="bg-red-500 text-white text-center font-semibold rounded-lg p-2 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
            </a>
            <input type="submit" value="Registrar" class="bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
        </div>
    </form>
</div>


@endsection
@stack('scripts')
<script src="https://kit.fontawesome.com/aaef00cbdd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showProveedoresModal() {
        Swal.fire({
            title: '¿Generar pase de acceso?',
            text: 'Seleccione una opción',
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Registrar proveedor',
            denyButtonText: 'Consultar proveedor',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
            customClass: {
                confirmButton: 'bg-blue-500 text-white hover:bg-blue-600',
                denyButton: 'bg-green-500 text-white hover:bg-green-600',
                cancelButton: 'bg-gray-500 text-white hover:bg-gray-600'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Opción de "Registrar proveedor"
                Swal.fire(
                    'Registrar proveedor',
                    'Será redirigido a la sección de registro.',
                    'success'
                );
                // Redirigir al formulario de registro de proveedor
                setTimeout(() => {
                    window.location.href = '/registro-proveedor'; // Cambia esta URL según corresponda
                }, 2000);
            } else if (result.isDenied) {
                // Opción de "Consultar proveedor"
                Swal.fire(
                    'Consultar proveedor',
                    'Será redirigido a la sección de consulta.',
                    'info'
                );
                setTimeout(() => {
                    window.location.href = '/consultar-proveedor'; // Cambia esta URL según corresponda
                }, 2000);
                // Redirigir a la sección de consulta de proveedor
            } else if (result.isDismissed) {
                // Opción de "Cancelar"
                Swal.fire(
                    'Acción cancelada',
                    'No se realizó ninguna acción.',
                    'error'
                );
            }
        });
    }
</script>