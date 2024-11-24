@extends('layout.app')
@section('title')
    Administración
@endsection

@section('contenido')
    <div class=" container mx-auto ">
        <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
            <h1 class="text-5xl uppercase font-bold text-center text-gray-800 mb-14 tracking-tight transition-all duration-300 hover:text-primary">
                Administración
            </h1>
            <div class="grid grid-cols-1 @php echo auth()->user()->type==1? 'md:grid-cols-3':'md:grid-cols-2' @endphp  items-center gap-8 text-center mt-16">
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
                <button onclick="showVisitasModal()" class="group p-12 bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                    <div class="flex flex-col items-center">
                        <!-- Icono de Bitácora -->
                        <i class="text-6xl text-green-500 mb-4 fa-regular fa-calendar"></i>
                        <!-- Texto de Bitácora -->
                        <span class="text-3xl font-semibold text-gray-700 group-hover:text-green-600">Gestión de visitas</span>
                    </div>
                </button>
                @if(auth()->user()->type==1)
                    <button onclick="showUsuariosModal()" class="group p-12 bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <!-- Icono de Usuario -->
                            <li class="text-6xl text-amber-500 mb-4 fa-solid fa-users"></li>                                              
                            <!-- Texto de Usuario -->
                            <span class="text-3xl font-semibold text-gray-700 group-hover:text-amber-500">Gestión de usuarios</span>
                        </div>
                    </button>
                @endif
                
            </div>
        </div>
@endsection
@stack('scripts')
<script src="https://kit.fontawesome.com/aaef00cbdd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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