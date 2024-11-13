<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-8t1cj77N.css') }}">
    <script src="https://kit.fontawesome.com/aaef00cbdd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>
    <div class=" container mx-auto ">
        <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
            <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8 tracking-tight uppercase transition-all duration-300 hover:text-primary">
                Administración
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
                
                <!-- Opción de Proveedores -->
                <button onclick="showProveedoresModal()" class="group p-12 bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <!-- Icono de Proveedores -->
                        <i class="text-6xl text-blue-500 mb-4 fa-solid fa-boxes-stacked"></i>
                        <!-- Texto de Proveedores -->
                        <span class="text-3xl font-semibold text-gray-700 group-hover:text-blue-600">Gestión de proveedores</span>
                    </div>
                </button>
                
                <!-- Opción de Bitácora -->
                <a href="#" class="group p-12 bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <!-- Icono de Bitácora -->
                        <i class="text-6xl text-green-500 mb-4 fa-regular fa-calendar"></i>
                        <!-- Texto de Bitácora -->
                        <span class="text-3xl font-semibold text-gray-700 group-hover:text-green-600">Gestión de visitas</span>
                    </div>
                </a>
                
                <!-- Opción de Usuario -->
                <a href="#" class="group p-12 bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <!-- Icono de Usuario -->
                        <li class="text-6xl text-amber-500 mb-4 fa-solid fa-users"></li>                                              
                        <!-- Texto de Usuario -->
                        <span class="text-3xl font-semibold text-gray-700 group-hover:text-amber-500">Gestión de usuarios</span>
                    </div>
                </a>
                
            </div>
        </div>
        
    </div>
</body>
<script>
    function showProveedoresModal() {
        Swal.fire({
            title: '¿Qué operación realizará?',
            text: 'Seleccione una opción',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Registrar proveedor',
            cancelButtonText:  'Consultar proveedor',
            focusCancel: true,
            reverseButtons: true,
            customClass: {
                confirmButton: 'bg-blue-500 text-white',
                cancelButton: 'bg-green-500 text-white'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí se ejecuta si el usuario elige "Registrar nuevo proveedor"
                Swal.fire(
                    'Registrar proveedor',
                    'Será redirigido a la sección de registro.',
                    'success'
                );
                // Puedes redirigir al formulario de registro de proveedor
                window.location.href = '/registro-proveedor'; // Cambia esta URL según corresponda
            } else if (result.isDismissed) {
                // Aquí se ejecuta si el usuario elige "Consultar proveedor"
                Swal.fire(
                    'Consultar proveedor',
                    'Será redirigido a la sección de consulta.',
                    'info'
                );
                // Puedes redirigir a la sección de consulta de proveedor
                window.location.href = '/consultar-proveedor'; // Cambia esta URL según corresponda
            }
        });
    }
</script>
</html>
