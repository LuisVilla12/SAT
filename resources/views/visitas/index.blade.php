@extends('layout.app')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endpush

@section('title')
    Historial de visitas
@endsection

@section('contenido')
<div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-7xl bg-white p-14 shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-4xl font-bold text-left text-gray-700 mb-10"> Historial de visitas</h2>
        @if(count($visitas)>0)
        <!-- Filtros y buscador -->
        <div class="grid grid-cols-3 gap-3 mb-6">
            <!-- Buscar por nombre -->
            <div class="flex items-center">
                <span class="absolute pl-3 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input id="searchInput" type="text" placeholder="Buscar por nombre o por empresa"
                    class="px-4  pl-10 py-2  border border-gray-300 rounded-lg shadow-md w-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            
            <!-- Filtrar por fecha -->
            <input id="dateFilter" type="date"
                class="px-4 py-2 border border-gray-300 rounded-lg shadow-md w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
            
            <!-- Filtrar por hora de salida -->
            <select id="exitHourFilter"
                class="px-4 py-2 border border-gray-300 rounded-lg shadow-md w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Hora de salida</option>
                <option value="00:00:00">Sin registro</option>
                <option value="registrada">Registradas</option>
            </select>
        </div>

        <!-- Tabla de visitas -->
        <table class="min-w-full bg-white">
            <thead>
                <tr class="border border-gray-300 rounded-lg ">
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Proveedor</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Área</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Fecha</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Hora Entrada</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Hora Salida</th>
                    <th colspan="2" class="py-3 px-4 uppercase text-center font-semibold text-sm">Acciones</th>
                </tr>
            </thead>

            <tbody id="visitsTable" class="text-gray-700 text-center">
                @foreach ($visitas as $visita)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150"
                    data-name="{{ $visita->name_persona }}"
                    data-date="{{ $visita->fecha_visita }}"
                    data-company="{{ $visita->proveedors->name_company }}"
                    data-exit-hour="{{ $visita->hora_salida }}">
                    
                    <td class="py-4 px-4">{{ $visita->id }}</td>
                    <td class="py-4 px-4">{{ $visita->name_persona }}</td>
                    <td class="py-4 px-4">{{ $visita->proveedors->name_company }}</td>
                    <td class="py-4 px-4">{{ $visita->area }}</td>
                    <td class="py-4 px-4">{{ $visita->fecha_visita }}</td>
                    <td class="py-4 px-4">{{ $visita->hora_entrada }}</td>
                    <td class="py-4 px-4">{{ $visita->hora_salida == '00:00:00' ? 'Sin registro' : $visita->hora_salida }}</td>
                    <td class="py-4 px-4">
                        @if ($visita->hora_salida == '00:00:00')
                        <a href="{{ route('visitas.edit', $visita) }}" class="flex place-items-center text-white font-bold py-3 px-5 rounded-full hover:transition duration-200">
                            <img src="{{ asset('img/pendiente.png') }}" class="w-6 mx-auto" alt="">
                        </a>
                        @else
                            <a href="{{ route('visitas.show', $visita) }}" class="flex place-items-center  text-white font-bold py-3 rounded-full hover:transition duration-200">
                                <img src="{{ asset('img/ojo.png') }}" class="w-6 mx-auto" alt="">
                            </a>
                        @endif
                    </td>
                    {{-- <td class="py-4 px-4"> --}}
                        {{-- <a href="{{ route('visitas.generarPase',$visita->id) }}" class="bg-blue-500 text-white font-bold py-2 px-9 rounded-full hover:bg-blue-500 transition duration-200">
                            Generar
                        </a> --}}
                    {{-- </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6 bg-white">
            {{ $visitas->links() }}
        </div>
        @else
            <p class="text-center text-xl my-28">No hay visitas registradas.</p>
        @endif
        <div class="flex justify-center gap-5 mt-7">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
            </a>
            <a href="{{ route('visitas.create') }}" class="bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                Registrar nueva visita
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
    const dateFilter = document.getElementById("dateFilter");
    const exitHourFilter = document.getElementById("exitHourFilter");
    const tableRows = document.querySelectorAll("#visitsTable tr");

    const filterTable = () => {
        const searchText = searchInput.value.toLowerCase();
        const selectedDate = dateFilter.value;
        const selectedExitHour = exitHourFilter.value;

        tableRows.forEach(row => {
            const name = row.getAttribute("data-name").toLowerCase();
            const date = row.getAttribute("data-date");
            const company = row.getAttribute("data-company").toLowerCase();
            const exitHour = row.getAttribute("data-exit-hour");

            let matchesSearch = name.includes(searchText) || company.includes(searchText);
            let matchesDate = selectedDate === "" || date === selectedDate;
            let matchesExitHour = selectedExitHour === "" ||
                (selectedExitHour === "00:00:00" && exitHour === "00:00:00") ||
                (selectedExitHour === "registrada" && exitHour !== "00:00:00");

            if (matchesSearch && matchesDate && matchesExitHour) {
                row.style.display = ""; // Mostrar fila
            } else {
                row.style.display = "none"; // Ocultar fila
            }
        });
    };

    searchInput.addEventListener("input", filterTable);
    dateFilter.addEventListener("change", filterTable);
    exitHourFilter.addEventListener("change", filterTable);
});

</script>
@endpush