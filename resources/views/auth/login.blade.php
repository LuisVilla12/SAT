<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Acceso</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DvYtEOEK.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-fondo bg-cover  w-full   min-h-screen" style="">

    <div class="flex items-center justify-center min-h-screen bg-black/60">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <div class="text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-blue-100 rounded-full">
                    <i class="fas fa-shield-alt text-blue-600 text-3xl"></i>
                </div>
                <h1 class="mt-4 text-2xl font-bold text-gray-800 uppercase">Portal de Acceso</h1>
                <p class="mt-2 text-md text-gray-500">Sistema de Administración Tributaria</p>
            </div>

            <form class="mt-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4 relative">
                    <label for="username" class="block text-md font-medium text-gray-700">Usuario</label>
                    <div class="flex items-center">
                        <span class="absolute pl-3 text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" id="username" name="username"
                            class="w-full pl-10 px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('username') border-red-500 @enderror"
                            placeholder="Ingrese su nombre de usuario"  value="{{ old('username') }}">
                    </div>
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-md font-medium text-gray-700">Contraseña</label>
                    <div class="flex items-center">
                        <span class="absolute pl-3 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password"
                            class="w-full pl-10 px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ingrese su contraseña">
                    </div>
                </div>
                @error('mensaje')
                <p class="mx-1 mt-1 mb-2 text-red-500 text-center">Error al iniciar sesión: Usuario y/o contraseñas incorrectas.</p>
                @endif
                <button type="submit"
                    class="cursor-pointer w-full px-4 my-5 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 uppercase">Iniciar
                    Sesión</button>
            </form>
        </div>
    </div>

</body>

</html>