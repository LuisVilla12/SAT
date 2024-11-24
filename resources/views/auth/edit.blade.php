@extends('layout.app')
@section('title')
    Actualizar usuario
@endsection
@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('auth.edit',$usuario) }}" method="POST" autocomplete="off" class="usuario bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        @csrf
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Actualizar usuario</h2>
        <!-- Nombre de la persona -->
        <div class="mb-6">
            <label for="name" class="block text-gray-600 font-semibold mb-2">Nombre(s):</label>
            <input type="text" id="name" name="name" placeholder="Ingrese su nombre" value="{{ $usuario->name }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror">
                @error('name')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre valido.</p>
                @enderror
        </div>

        <!-- Apellido Paterno -->
        <div class="mb-6">
            <label for="lastnameP" class="block text-gray-600 font-semibold mb-2">Apellido paterno:</label>
            <input type="text" id="lastnameP" name="lastnameP" placeholder="Ingrese su apellido paterno" value="{{$usuario->lastnameP }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameP') border-red-500 @enderror">
                @error('lastnameP')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido paterno valido.</p>
                @enderror
        </div>

    
        <!-- Apellido Materno -->
        <div class="mb-6">
            <label for="lastnameM" class="block text-gray-600 font-semibold mb-2">Apellido materno:</label>
            <input type="text" id="lastnameM" name="lastnameM" placeholder="Ingrese su apellido materno" value="{{$usuario->lastnameM }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('lastnameM') border-red-500 @enderror">
                @error('lastnameM')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un apellido materno valido.</p>
                @enderror
        </div>

        <!-- Correo electrónico -->
        <div class="mb-6">
            <label for="email" class="block text-gray-600 font-semibold mb-2">Correo electronico:</label>
            <input type="text" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ $usuario->email }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="mx-1 mt-1 text-red-500">Debes ingresar un correo electronico valido y unico.</p>
                @enderror
        </div>
        <!-- Nombre de usuario -->
        <div class="mb-6">
            <label for="username" class="block text-gray-600 font-semibold mb-2">Nombre de usuario:</label>
            <input type="text" id="username" name="username" placeholder="Ingrese su nombre de usuario" value="{{ $usuario->username }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('username') border-red-500 @enderror">
            @error('username')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de usuario valido y unico.</p>
            @enderror
        </div>
        <!-- Empresa que representa -->
        <div class="mb-6">
            <label for="company" class="block text-gray-600 font-semibold mb-2">Empresa que representa:</label>
            <input type="text" id="company" name="company" placeholder="Ingrese la empresa que representa" value="{{ $usuario->company }}" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('company') border-red-500 @enderror">
            @error('company')
                <p class="mx-1 mt-1 text-red-500">Debes ingresar un nombre de usuario valido.</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="type" class="block text-gray-600 font-semibold mb-2">Tipo de usuario:</label>
            <select id="type" name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('type') border-solid border-2 border-red-500  @enderror">
                <option value="" disabled selected>Seleccione un tipo de usuario</option>
                <option @php echo $usuario->type =='2' ? 'selected':''; @endphp value="2">Control de acceso</option>
                <option @php echo $usuario->type =='1' ? 'selected':''; @endphp value="1">Administrador</option>
            </select>
            @error('type')
            <p class="mx-1 mt-1 text-red-500">Debes seleecionar el tipo de usuario.</p>
        @enderror

        <!-- Contraseña -->
        <div class="mb-6">
            <input type="hidden" id="password" name="password" value="{{$usuario->password}}" placeholder="Ingrese su contraseña" 
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
        </div>
        {{-- ID --}}
        <div class="mb-6">
            <input type="hidden" id="id" name="id" value="{{$usuario->id}}"
                class="px-4 py-2 block w-full rounded-lg shadow-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
        </div>

        </div>
        <!-- Botón de Enviar -->
        <div class="flex justify-center gap-5 mt-10">
            <a href="{{ route('auth.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
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
        // console.log(btnRegistrar);
        
        btnRegistrar.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío inmediato del formulario
        Swal.fire({
            title: "¿Seguro que quieres actualizar este usuario?",
            showDenyButton: true,
            confirmButtonText: "Actualizar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de forma tradicional
                document.querySelector('.usuario').submit();
            } else if (result.isDenied) {
                Swal.fire("No se actualizo el usuario", "", "info");
            }
        });
    });
    });
</script>

