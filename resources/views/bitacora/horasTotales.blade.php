@extends('layout.app')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endpush

@section('title')
    Cumplimiento de servicio social
@endsection

@section('contenido')
    <div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
        <div class="w-full max-w-7xl bg-white p-14 shadow-lg rounded-lg overflow-hidden">
            <div class="flex justify-between mb-10">
                <h2 class="text-4xl font-bold text-left text-gray-700"> Horas totales </h2>
            </div>
            @if (count($registros) > 0)
                <!-- Filtros y buscador -->
                <div class="grid grid-cols-3 gap-3 mb-6">
                    <!-- Buscar por nombre -->
                    <div class="flex items-center">
                        <span class="absolute pl-3 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input id="searchInput" type="text" placeholder="Buscar por nombre"
                            class="px-4  pl-10 py-2  border border-gray-300 rounded-lg shadow-md w-full  focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>

                <!-- Tabla de visitas -->
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="border border-gray-300 rounded-lg ">
                            <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Matricula</th>
                            <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre</th>
                            <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Instituto</th>
                            <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Horas realizadas</th>
                        </tr>
                    </thead>

                    <tbody id="visitsTable" class="text-gray-700 text-center">
                        @foreach ($estudiantes as $estudiante)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150"
                                data-name="{{ $estudiante->name . ' ' . $estudiante->lastname_p . ' ' . $estudiante->lastname_m }}"
                                >
                                <td class="py-4 px-4">{{ $estudiante->matricula }}</td>
                                <td class="py-4 px-4">
                                    {{ $estudiante->name . ' ' . $estudiante->lastname_p . ' ' . $estudiante->lastname_m }}
                                </td>
                                <td class="py-4 px-4">
                                    {{ $estudiante->company }}
                                </td>
                                <td class="py-4 px-4">
                                    {{-- {{$estudiante->tiempo_estadia}} --}}
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $estudiante->tiempo_estadia)->format('G \h\o\r\a\s, i \m\i\n\u\t\o\s') }}

                                </td>
                        </tr>
            @endforeach
            </tbody>
            </table>
            <div class="mt-6 bg-white">
                {{ $registros->links() }}
            </div>
        @else
            <p class="text-center text-xl my-28">No hay visitas registradas.</p>
            @endif
            <div class="flex justify-center gap-5 mt-7">
                <a href="{{ route('admin.index') }}"
                    class="bg-red-500 text-white font-bold py-3 hover:cursor-pointer px-5   rounded-lg hover:bg-red-600 transition duration-300">
                    <img src="{{ asset('img/flecha.png') }}" class="w-6" alt="">
                </a>
                <a href="{{ route('bitacora.create') }}"
                    class="bg-blue-500 text-white font-bold py-3 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                    Registrar checada
                </a>
            </div>
        </div>
    </div>

                    {{-- <option value="{{$estudiante->id}}">{{"Matricula: ".$estudiante->matricula  . "--Nombre: ".$estudiante->name . " ". $estudiante->lastname_p. " ". $estudiante->lastname_m . "--Horas totales: ". $estudiante->tiempo_estadia}}</option> --}}
    </div>

@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const searchInput = document.getElementById("searchInput");
            const tableRows = document.querySelectorAll("#visitsTable tr");

            const filterTable = () => {
                const searchText = searchInput.value.toLowerCase();

                tableRows.forEach(row => {
                    const name = row.getAttribute("data-name").toLowerCase();

                    let matchesSearch = name.includes(searchText);
                    if (matchesSearch) {
                        row.style.display = ""; // Mostrar fila
                    } else {
                        row.style.display = "none"; // Ocultar fila
                    }
                });
            };

            searchInput.addEventListener("input", filterTable);
            dateFilter.addEventListener("change", filterTable);
            exitHourFilter.addEventListener("change", filterTable);


            // Selecciona el enlace y el modal
            const btnMostrar = document.querySelector('.btnMostrar');
            const modal = document.getElementById('myModal');
            const btnCerrar = document.querySelector('.closeModal');

            // Abrir el modal
            btnMostrar.addEventListener('click', (e) => {
                e.preventDefault(); // Evita el comportamiento por defecto del enlace
                modal.classList.remove('hidden'); // Muestra el modal
            });

            // Cerrar el modal
            btnCerrar.addEventListener('click', () => {
                modal.classList.add('hidden'); // Oculta el modal
            });

            // Cerrar el modal haciendo clic fuera de él
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden'); // Oculta el modal
                }
            });
        });
    </script>
@endpush
