<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle del teléfono
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex gap-10">

                {{-- Imagen --}}
                <div class="flex-1 flex items-center justify-center bg-gray-50 rounded-lg">
                    <img src="{{ $tel->imagen }}" alt="{{ $tel->modelo }}" class="max-h-80 object-contain">
                </div>

                {{-- Información --}}
                <div class="flex-1">
                    <p class="text-xs font-semibold text-indigo-500 uppercase mb-1">
                        {{ strtoupper($tel->marca) }}
                    </p>

                    <h1 class="text-2xl font-bold text-gray-900 mb-3">
                        {{ $tel->modelo }}
                    </h1>

                    <p class="text-sm text-gray-600 mb-4">
                        {{ $tel->descripcion }}
                    </p>

                    <div class="mb-4">
                        <p class="text-3xl font-bold text-orange-500">
                            S/ {{ number_format($tel->precio, 2) }}
                        </p>
                        <p class="text-sm text-gray-600 mt-1">
                            Stock:
                            <span class="font-semibold">
                                {{ $tel->stock }} disponible(s)
                            </span>
                        </p>
                    </div>

                    @auth
                        {{-- Mensaje de éxito --}}
                        @if(session('success'))
                            <p class="text-sm text-green-600 mb-3">
                                {{ session('success') }}
                            </p>
                        @endif

                        {{-- Formulario agregar al carrito --}}
                        <form action="{{ route('carrito.add', $tel->id_telefono) }}"
                              method="POST"
                              class="flex items-center gap-3">
                            @csrf

                            {{-- cantidad: mínimo 1, máximo el stock --}}
                            <input
                                type="number"
                                name="cantidad"
                                min="1"
                                max="{{ $tel->stock }}"
                                value="1"
                                class="w-16 border rounded text-center py-1"
                            >

                            <button
                                type="submit"
                                class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-5 py-2 rounded-md text-sm">
                                Lo quiero
                            </button>
                        </form>
                    @else
                        <p class="text-sm text-gray-600 mt-4">
                            Para comprar, primero debes
                            <a href="{{ route('login') }}" class="text-indigo-600 underline">
                                iniciar sesión
                            </a>.
                        </p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
