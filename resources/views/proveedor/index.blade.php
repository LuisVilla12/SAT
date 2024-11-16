@extends('layout.app')
@section('title')
    Consulta de proveedores
@endsection

@section('contenido')

<div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-4xl bg-white p-14 shadow-lg rounded-lg overflow-hidden">
        <h2 class="text-4xl font-bold text-center text-gray-700 mb-10">Proveedores</h2>

        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-blue-600 text-white text-left">
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre Responsable</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Nombre Empresa</th>
                    <th class="py-3 px-4 uppercase text-center font-semibold text-sm">Estado</th>
                    <th colspan="2" class="py-3 px-4 uppercase text-center font-semibold text-sm">Acciones</th>
                </tr>
            </thead>
            
            <tbody class="text-gray-700 text-center">
                <!-- Ejemplo de una fila de datos -->
                @foreach ($proveedores as $proveedor )
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150">
                    <td class="py-4 px-4">{{$proveedor->id}}</td>
                    <td class="py-4 px-4">{{$proveedor->name_persona}}</td>
                    <td class="py-4 px-4">{{$proveedor->name_company}}</td>
                    <td class="py-4 px-4">{{$proveedor->state=='1' ? 'Activo':'Inactivo' }}</td>
                    <td class="py-4 px-4">
                        <a href="{{ route('proveedor.edit',$proveedor)}}" class="bg-yellow-400 text-white font-bold py-2 px-5 rounded-full hover:bg-yellow-500 transition duration-200">
                            Editar
                        </a>
                    </td>
                    <td class="py-4 px-4">
                        <button class="bg-red-500 text-white font-bold py-2 px-4 rounded-full hover:bg-red-600 transition duration-200">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center gap-5 mt-7">
            <a href="{{ route('admin.index') }}" class="bg-red-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-red-600 transition duration-300">
                Regresar
            </a>
            <a href="{{ route('proveedor.create') }}" class="bg-blue-500 text-white font-bold py-4 hover:cursor-pointer px-10 rounded-lg hover:bg-blue-600 transition duration-300">
                Registrar
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta', evento_id => {
        Swal.fire({
            title: '¿Eliminar evento?',
            text: "Una publicación eliminada no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                    // Eliminar Vacante
                    Livewire.emit('eliminarEvento',evento_id);
                    Swal.fire(
                        'Se ha Eliminado el evento',
                        'Eliminado correctamente',
                        'success'
                    )
                }
        });
    });
</script>
@endpush