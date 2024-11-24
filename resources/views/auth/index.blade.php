@extends('layout.app')
@section('title')
    Consulta de usuarios
@endsection

@section('contenido')

<div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-6xl bg-white p-14 shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10 uppercase">Gestión de usuarios</h2>
        @if(count($usuarios)>0)
        <!-- Barra de búsqueda y filtro -->
        <div class="flex justify-between items-center mb-5">
            <!-- Barra de búsqueda -->
            <div class="flex">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Buscar por nombre o empresa..." 
                    class="px-4 py-2 border border-gray-300 rounded-lg w-96 focus:outline-none focus:ring-2 focus:ring-blue-400"
                />
            </div>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-blue-600 text-white text-left">
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
                        {{-- <button class="flex place-items-center text-white font-bold py-3 px-4 rounded-full hover:transition duration-200">
                            <img src="{{ asset('img/delete.png') }}" class="w-7 mx-auto" alt="">
                        </button> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
