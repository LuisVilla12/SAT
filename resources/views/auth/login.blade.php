<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-8t1cj77N.css') }}">
</head>
<body>
    <div class=" container mx-auto ">
        <div class="grid md:grid-cols-2 gap-7 place-items-center min-h-screen bg-gray-100 rounded-lg">
            <form method="POST" action="{{ route('login') }}" novalidate class="px-10 py-8 bg-white shadow-lg rounded-lg w-full max-w-lg">
                @csrf
                <h1 class="text-center text-blue-600 font-bold uppercase text-3xl my-7">Iniciar sesión</h1>
                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-semibold">Correo electrónico:</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese su correo electrónico"  class="p-3 rounded-lg shadow-md w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="bg-red-500 text-white text-center rounded-md font-semibold p-2 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-semibold">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Ingrese su contraseña"  class="p-3 rounded-lg shadow-md w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white text-center rounded-md font-semibold p-2 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                @if (session('mensaje'))
                    <p class="mb-5 bg-red-500 text-white text-center rounded-md font-semibold p-2">{{ session('mensaje') }}</p>
                @endif
                
                <div class="mb-5 flex items-center">
                    <input type="checkbox" name="remember" id="sesion" class="mr-2">
                    <label for="sesion" class="text-gray-500">Mantener la sesión abierta</label>
                </div>
                
                <p class="my-8 text-center text-gray-500">
                    ¿No tiene una cuenta? 
                    <a href="{{ route('register.create') }}" class="text-blue-600 hover:underline">Regístrese Ahora</a>
                </p>
                
                <div class="grid place-items-center">
                    <input type="submit" value="Iniciar sesión" class="uppercase font-bold bg-blue-600 text-white py-3 px-10 rounded-full shadow-md hover:bg-blue-700 transition duration-300 ease-in-out cursor-pointer">
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>