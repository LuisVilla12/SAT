@extends('layout.app')
@section('title')
    Consulta de usuarios
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endpush


@section('contenido')

<div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-6xl bg-white p-14 shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-4xl font-bold text-left text-gray-700 mb-10">Gestión de Usuarios</h2>
        @if(count($usuarios)>0)
        <!-- Barra de búsqueda y filtro -->
        <div class="flex justify-between items-center mb-5">
            <!-- Barra de búsqueda -->
            <div class="flex items-center">
                <span class="absolute pl-3 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Buscar por nombre o empresa..." 
                    class="px-4 pl-10 py-2 border border-gray-300 rounded-lg w-96 focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr class="border border-gray-300 rounded-lg">
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre completo</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre de usuario</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Empresa</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Acciones</th>
                </tr>
            </thead>
            
            <tbody id="usersTable" class="text-gray-700 text-center">
                @foreach ($usuarios as $usuario)
                <tr 
                    class="border-b border-gray-200 hover:bg-gray-100 transition duration-150" 
                    data-state="{{ $usuario->username }}" 
                    data-name="{{ strtolower($usuario->name) }}" 
                    data-company="{{ strtolower($usuario->company) }}"
                >
                    <td class="py-4 px-4">{{ $usuario->id}}</td>
                    <td class="py-4 px-4">{{ $usuario->name . " " . $usuario->lastnameP . " ". $usuario->lastameM  }}</td>
                    <td class="py-4 px-4">{{ $usuario->username }}</td>
                    <td class="py-4 px-4">{{ $usuario->company }}</td>
                    <td class="py-4 px-4 flex justify-center items-center">
                        <a href="{{ route('auth.edit',$usuario) }}" class="flex place-items-center text-white font-bold py-3 px-5 rounded-full hover:transition duration-200">
                            <img src="{{ asset('img/editar.png') }}" class="w-7 mx-auto" alt="">
                        </a>
                        <a href="{{ route('auth.show',$usuario->id) }}" class="flex place-items-center text-white font-bold py-3 px-5 rounded-full hover:transition duration-200">
                            <img src="{{ asset('img/view.png') }}" class="w-7 mx-auto" alt="">
                        </a>
                        <a href="{{ route('auth.edit_password',$usuario->id) }}" class="flex place-items-center text-white font-bold py-3 px-5 rounded-full hover:transition duration-200">
                            <img src="{{ asset('img/lock.png') }}" class="w-7 mx-auto" alt="">
                        </a>
                        <form action="{{ route('auth.destroy', $usuario->id) }}" method="POST" class="proveedorform">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btnEliminar flex place-items-center text-white font-bold py-3 px-4 rounded-full hover:transition duration-200">
                                <img src="{{ asset('img/delete.png') }}" class="w-7 mx-auto" alt="">
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6 bg-white">
            {{ $usuarios->links() }}
        </div>
        @else
            <p class="text-center text-xl my-28">No hay usuarios registrados.</p>
        @endif
        <div class="flex justify-evenly gap-5 mt-7">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <a href="{{ route('auth.create') }}" class="bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                Registrar nuevo usuario
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("searchInput");
        const tableRows = document.querySelectorAll("#usersTable tr");
        const buttonDelete = document.querySelectorAll('.btnEliminar');
        buttonDelete.forEach((button) => {
    button.addEventListener('click', (e) => {
        e.preventDefault(); // Evita el envío inmediato del formulario

        Swal.fire({
            title: "¿Seguro que quieres eliminar este registro?",
            showDenyButton: true,
            confirmButtonText: "Eliminar",
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario correspondiente al botón clicado
                button.closest('form').submit();
            } else if (result.isDenied) {
                Swal.fire("No se llevo acabo la eliminación", "", "info");
            }
        });
    });
});

        function filterTable() {
            const searchValue = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const state = row.getAttribute("data-state");
                const name = row.getAttribute("data-name");
                const company = row.getAttribute("data-company");

                const matchesSearch = name.includes(searchValue) || company.includes(searchValue);

                if (matchesSearch) {
                    row.style.display = ""; // Mostrar la fila
                } else {
                    row.style.display = "none"; // Ocultar la fila
                }
            });
        }

        searchInput.addEventListener("input", filterTable);
    });
</script>
@endpush
