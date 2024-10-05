<!-- resources/views/ofertas/index.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6">Lista de Ofertas</h1>

            <!-- Mostrar el botón "Crear Oferta" solo para empresas y admins -->
            @role('empresa|admin')
            <div class="mb-4">
                <a href="{{ route('ofertas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Crear Oferta</a>
            </div>
            @endrole

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table-auto w-full mt-5">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Título</th>
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Salario</th>
                        <th class="px-4 py-2">Ubicación</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ofertas as $oferta)
                        <tr class="bg-gray-100">
                            <td class="border px-4 py-2">{{ $oferta->titulo }}</td>
                            <td class="border px-4 py-2">{{ Str::limit($oferta->descripcion, 50) }}</td>
                            <td class="border px-4 py-2">{{ $oferta->salario }}</td>
                            <td class="border px-4 py-2">{{ $oferta->ubicacion }}</td>
                            <td class="border px-4 py-2">
                                <!-- Botón de Ver Detalles, visible para todos -->
                                <a href="{{ route('ofertas.show', $oferta->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Ver Detalles</a>

                                <!-- Solo mostrar Editar y Eliminar para empresas y admins -->
                                @role('empresa|admin')
                                    <a href="{{ route('ofertas.edit', $oferta->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
                                    <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                    </form>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
