<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-6">{{ $oferta->titulo }}</h1>

            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Mensaje de alerta si ya está postulado -->
            @if (session('alert'))
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    {{ session('alert') }}
                </div>
            @endif

            <div class="mb-4">
                <strong>Descripción:</strong> {{ $oferta->descripcion }}
            </div>

            <div class="mb-4">
                <strong>Salario:</strong> {{ $oferta->salario }}
            </div>

            <div class="mb-4">
                <strong>Ubicación:</strong> {{ $oferta->ubicacion }}
            </div>

            <div class="mb-4">
                <strong>Fecha de Vencimiento:</strong> {{ $oferta->fecha_vencimiento }}
            </div>

            <!-- Botón de Postularse (visible solo para postulantes) -->
            @role('postulante')
            <form action="{{ route('postularse', $oferta->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Postularse</button>
            </form>
            @endrole

            <div class="flex justify-end mt-4">
                <a href="{{ route('ofertas.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Regresar</a>
            </div>
        </div>
    </div>
</x-app-layout>
