@extends('layout.app')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endpush

@section('title')
    Consulta de proveedores
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-6xl bg-white p-14 shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-4xl font-bold text-gray-700 mb-10">Gestión de proveedores</h2>
        @if(count($proveedores)>0)
        <!-- Barra de búsqueda y filtro -->
        <div class="flex justify-between items-center mb-5">
            <!-- Barra de búsqueda -->
            <div class="flex items-center">
                <span class="absolute pl-3 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input  type="text" id="searchInput" placeholder="Buscar por nombre o empresa..." 
                class="px-4  pl-10 py-2 border border-gray-300 rounded-lg w-96 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
            </div>
            <!-- Filtro por estado -->
            <div>
                <select 
                    id="filterSelect" 
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                    <option value="all">Todos</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
        </div>

        <table class="min-w-full bg-white ">
            <thead class=" border border-gray-300 rounded-lg">
                <tr class="  text-left">
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre Responsable</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre Empresa</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Estado</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Acciones</th>
                </tr>
            </thead>
            
            <tbody id="proveedoresTable" class="text-gray-700 text-center">
                @foreach ($proveedores as $proveedor)
                <tr 
                    class="border-b border-gray-200 hover:bg-gray-100 transition duration-150" 
                    data-state="{{ $proveedor->state }}" 
                    data-name="{{ strtolower($proveedor->name_persona) }}" 
                    data-company="{{ strtolower($proveedor->name_company) }}"
                >
                    <td class="py-4 px-4">{{ $proveedor->id }}</td>
                    <td class="py-4 px-4">{{ $proveedor->name_persona }}</td>
                    <td class="py-4 px-4">{{ $proveedor->name_company }}</td>
                    <td class="">
                        <span class="{{$proveedor->state == '1'? 'bg-green-600':'bg-gray-600' }} py-2 px-4 rounded-3xl text-white">{{ $proveedor->state == '1' ? 'Activo' : 'Inactivo' }}</span></td>
                    <td class="py-4 px-4 flex justify-center items-center">
                        <a href="{{ route('proveedor.edit', $proveedor) }}" class="flex place-items-center text-white font-bold py-3 px-5 rounded-full hover:transition duration-200">
                            <img src="{{ asset('img/editar.png') }}" class="w-7 mx-auto" alt="">
                        </a>
                        <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="POST" class="proveedorform">
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
        @else
            <p class="text-center text-xl my-28">No hay proveedores registrados.</p>
        @endif
        <div class="flex justify-evenly gap-5 mt-7">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <a href="{{ route('proveedor.create') }}" class="bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                Registrar nuevo provedor
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
      // Selecciona todos los botones con la clase .btnEliminar
const buttonDelete = document.querySelectorAll('.btnEliminar');

// Itera sobre los botones y asigna el evento a cada uno
buttonDelete.forEach((button) => {
    button.addEventListener('click', (e) => {
        e.preventDefault(); // Evita el envío inmediato del formulario

        Swal.fire({
            title: "¿Seguro que quieres eliminar este proveedor?",
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

        
        
        const searchInput = document.getElementById("searchInput");
        const filterSelect = document.getElementById("filterSelect");
        const tableRows = document.querySelectorAll("#proveedoresTable tr");

        function filterTable() {
            const searchValue = searchInput.value.toLowerCase();
            const filterValue = filterSelect.value;

            tableRows.forEach(row => {
                const state = row.getAttribute("data-state");
                const name = row.getAttribute("data-name");
                const company = row.getAttribute("data-company");

                const matchesSearch = name.includes(searchValue) || company.includes(searchValue);
                const matchesFilter = filterValue === "all" || state === filterValue;

                if (matchesSearch && matchesFilter) {
                    row.style.display = ""; // Mostrar la fila
                } else {
                    row.style.display = "none"; // Ocultar la fila
                }
            });
        }

        searchInput.addEventListener("input", filterTable);
        filterSelect.addEventListener("change", filterTable);
    });
</script>
@endpush
