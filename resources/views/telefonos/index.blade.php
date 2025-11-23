<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Catálogo de teléfonos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Título de sección --}}
            <h3 class="text-lg font-semibold mb-4">
                ¡Ofertas y novedades!
            </h3>

            @if ($telefonos->isEmpty())
                <div class="bg-white p-6 rounded-xl shadow text-gray-600">
                    Aún no hay teléfonos registrados.
                </div>
            @else
                {{-- Grid de tarjetas tipo catálogo --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($telefonos as $tel)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">

                            {{-- Imagen --}}
                            <div class="bg-gray-50 flex items-center justify-center h-56">
                                <img src="{{ $tel->imagen }}"
                                     alt="{{ $tel->modelo }}"
                                     class="h-full object-contain">
                            </div>

                            {{-- Contenido --}}
                            <div class="p-4 flex flex-col flex-1">

                                {{-- Marca y estado --}}
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-xs font-semibold tracking-widest text-indigo-500 uppercase">
                                        {{ strtoupper($tel->marca) }}
                                    </span>

                                    @if ($tel->stock > 0)
                                        <span class="text-xs px-3 py-1 rounded-full bg-green-100 text-green-700">
                                            Disponible
                                        </span>
                                    @else
                                        <span class="text-xs px-3 py-1 rounded-full bg-red-100 text-red-700">
                                            Agotado
                                        </span>
                                    @endif
                                </div>

                                {{-- Modelo --}}
                                <h4 class="font-semibold text-gray-900">
                                    {{ $tel->modelo }}
                                </h4>

                                {{-- Descripción corta --}}
                                <p class="text-sm text-gray-500 mt-1 line-clamp-2">
                                    {{ $tel->descripcion }}
                                </p>

                                {{-- Precio --}}
                                <p class="mt-3 text-orange-500 font-bold text-lg">
                                    S/ {{ number_format($tel->precio, 2) }}
                                </p>

                                {{-- Spacer para empujar el botón abajo --}}
                                <div class="flex-1"></div>

                                {{-- Link detalle --}}
                                <a href="{{ route('telefonos.show', $tel->id_telefono) }}"
                                   class="mt-3 inline-flex text-sm text-indigo-600 hover:text-indigo-700">
                                    Ver detalles
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
