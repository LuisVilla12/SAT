<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DqHMddQ6.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .slide-down {
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen ">
        <div class="w-full max-w-xl">
            <div class="bg-blue-900">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-white mb-4 text-left">ADMINISTRACIÓN</h1>
                    <p class="text-sm text-white">Seleccione una opción para gestionar</p>
                </div>
            </div>
    
            <div class="bg-white">
                <!-- Opcion: Proveedores -->
                <div class="border-b border-gray-200 rounded-lg ">
                    <button onclick="toggleSection('proveedores')" class="flex items-center justify-between w-full p-4">
                        <div class="flex items-center">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-full mr-4">
                                <i class="fas fa-cogs fa-lg"></i>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">Gestión de proveedores</h2>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" id="icon-proveedores"
                            class="h-5 w-5 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <div id="section-proveedores" class="overflow-hidden max-h-0 opacity-0 slide-down">
                        <p class="text-sm text-gray-600 px-4">Administre los proveedores.
                        </p>
                        <div class="p-4">
                            <button onclick="showProveedoresModal()"
                                class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-600">
                                Acceder
                            </button>
                        </div>
                    </div>
                </div>
    
                <!-- Opcion: Visitas -->
                <div class="border-b border-gray-200">
                    <button onclick="toggleSection('visitas')" class="flex items-center justify-between w-full p-4">
                        <div class="flex items-center">
                            <div class="bg-green-100 text-green-600 p-2 rounded-full mr-4">
                                <i class="fas fa-calendar-check fa-lg"></i>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">Gestión de visitas</h2>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" id="icon-visitas"
                            class="h-5 w-5 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <div id="section-visitas" class="overflow-hidden max-h-0 opacity-0 slide-down">
                        <p class="text-sm text-gray-600 px-4">Gestione las visitas y acceda al historial de visitas.</p>
                        <div class="p-4">
                            <button
                            onclick="showVisitasModal()"
                                class="cursor-pointer bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-600">
                                Acceder
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Opcion: Usuarios -->
                @if(auth()->user()->type==1)

                <div class="border-b border-gray-200 rounded-lg ">
                    <button onclick="toggleSection('usuarios')" class="flex items-center justify-between w-full p-4">
                        <div class="flex items-center">
                            <div class="bg-orange-100 text-orange-600 p-2 rounded-full mr-4">
                                <i class="fas fa-users fa-lg"></i>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">Gestión de usuarios</h2>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" id="icon-usuarios"
                            class="h-5 w-5 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <div id="section-usuarios" class="overflow-hidden max-h-0 opacity-0 slide-down">
                        <p class="text-sm text-gray-600 px-4">Administre los usuarios del sistema.
                        </p>
                        <div class="p-4">
                            <button onclick="showUsuariosModal()"
                                class="cursor-pointer bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-600">
                                Acceder
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                <!-- Opcion: Servicio Social -->
    
    
                <!-- Botón para cerrar sesión -->
                <div class="mb-4 py-4 ">
                    <form method="POST" action="{{ route('logout') }}" class="">
                        @csrf
                        <div class="">
                            <button type="submit" class="mx-auto cursor-pointer block text-center  text-gray-500 text-lg hover:text-gray-800 ">
                                <i class="fas fa-sign-out-alt"></i>
                                Cerrar sesión
                        </button>
                        </div>

                    </form>
                </div>
    
            </div>
    
        </div>
    </div>

    <script src="https://kit.fontawesome.com/aaef00cbdd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toggleSection(id) {
            const section = document.getElementById(`section-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            if (section.classList.contains('max-h-0')) {
                section.classList.remove('max-h-0', 'opacity-0');
                section.classList.add('max-h-40', 'opacity-100');
                icon.classList.add('rotate-180');
            } else {
                section.classList.add('max-h-0', 'opacity-0');
                section.classList.remove('max-h-40', 'opacity-100');
                icon.classList.remove('rotate-180');
            }
        }
        function showProveedoresModal() {
        Swal.fire({
            title: '¿Qué desea realizar?',
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
    function showUsuariosModal() {
        Swal.fire({
            title: '¿Qué desea realizar?',
            text: 'Seleccione una opción',
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Registrar un usuario',
            denyButtonText: 'Consultar un usuario',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
            customClass: {
                confirmButton: 'bg-blue-500 text-white hover:bg-blue-600',
                denyButton: 'bg-green-500 text-white hover:bg-green-600',
                cancelButton: 'bg-gray-500 text-white hover:bg-gray-600'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Registrar usuario',
                    'Será redirigido a la sección de registro.',
                    'success'
                );
                setTimeout(() => {
                    window.location.href = '/registro-usuario'; // Cambia esta URL según corresponda
                }, 2000);
            } else if (result.isDenied) {
                // Opción de "Consultar proveedor"
                Swal.fire(
                    'Consultar usuarios',
                    'Será redirigido a la sección de consulta.',
                    'info'
                );
                setTimeout(() => {
                    window.location.href = '/usuarios'; // Cambia esta URL según corresponda
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
    function showVisitasModal() {
        Swal.fire({
            title: '¿Qué desea realizar?',
            text: 'Seleccione una opción',
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Registrar una visita',
            denyButtonText: 'Historial de visitas',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
            customClass: {
                confirmButton: 'bg-blue-500 text-white hover:bg-blue-600',
                denyButton: 'bg-green-500 text-white hover:bg-green-600',
                cancelButton: 'bg-gray-500 text-white hover:bg-gray-600'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Registrar Visita',
                    'Será redirigido a la sección de registro.',
                    'success'
                );
                setTimeout(() => {
                    window.location.href = '/registro-visitas'; // Cambia esta URL según corresponda
                }, 2000);
            } else if (result.isDenied) {
                // Opción de "Consultar proveedor"
                Swal.fire(
                    'Historial de visitas',
                    'Será redirigido a la sección de consulta.',
                    'info'
                );
                setTimeout(() => {
                    window.location.href = '/visitas'; // Cambia esta URL según corresponda
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

</body>

</html>

