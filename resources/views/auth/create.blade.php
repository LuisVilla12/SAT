@extends('layout.app')
@section('title')
    Registar usuario
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('auth.create') }}" method="POST" autocomplete="off" class="usuario bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Registrar usuario</h2>
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name" class="block text-gray-600 font-semibold mb-2">Nombre(s):</label>
            <input type="text" id="name" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
                @error('name')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre valido.</p>
                @enderror
        </div>

        <!-- Apellido Paterno -->
        <div class="mb-6">
            <label for="lastnameP" class="block text-gray-600 font-semibold mb-2">Apellido paterno:</label>
            <input type="text" id="lastnameP" name="lastnameP" placeholder="Ingrese su apellido paterno" value="{{ old('lastnameP') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameP') border-red-500 @enderror">
                @error('lastnameP')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido paterno valido.</p>
                @enderror
        </div>

    
        <!-- Apellido Materno -->
        <div class="mb-6">
            <label for="lastnameM" class="block text-gray-600 font-semibold mb-2">Apellido materno:</label>
            <input type="text" id="lastnameM" name="lastnameM" placeholder="Ingrese su apellido materno" value="{{ old('lastnameM') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameM') border-red-500 @enderror">
                @error('lastnameM')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido materno valido.</p>
                @enderror
        </div>

        <!-- Correo electrónico -->
        <div class="mb-6">
            <label for="email" class="block text-gray-600 font-semibold mb-2">Correo electronico:</label>
            <input type="text" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un correo electronico valido y unico.</p>
                @enderror
        </div>
        <!-- Nombre de usuario -->
        <div class="mb-6">
            <label for="username" class="block text-gray-600 font-semibold mb-2">Nombre de usuario:</label>
            <input type="text" id="username" name="username" placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('username') border-red-500 @enderror">
            @error('username')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de usuario valido y unico.</p>
            @enderror
        </div>
        <!-- Empresa que representa -->
        <div class="mb-6">
            <label for="company" class="block text-gray-600 font-semibold mb-2">Empresa que representa:</label>
            <input type="text" id="company" name="company" placeholder="Ingrese la empresa que representa" value="{{ old('company') }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('company') border-red-500 @enderror">
            @error('company')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de usuario valido.</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="type" class="block text-gray-600 font-semibold mb-2">Tipo de usuario:</label>
            <select id="type" name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione un tipo de usuario</option>
                <option value="2">Control de acceso</option>
                <option value="1">Administrador</option>
            </select>
            @error('type')
            <p class="mx-1 mt-1 text-red-500">Debes seleecionar el tipo de usuario.</p>
        @enderror
        </div>
        

        <!-- Contraseña -->
        <div class="mb-6">
            <label for="password" class="block text-gray-600 font-semibold mb-2">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar una contraseña valida minimo de 9 caracteres.</p>
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
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <input type="submit" value="Registrar" class="enviar bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300"/>
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
            title: "¿Seguro que quieres registrar un nuevo usuario?",
            showDenyButton: true,
            confirmButtonText: "Registrar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.usuario').submit();
            } else if (result.isDenied) {
                Swal.fire("No se registró el nuevo usuario", "", "info");
            }
        });
    });
    });
</script>

