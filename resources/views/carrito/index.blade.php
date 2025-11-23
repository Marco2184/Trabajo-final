<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carrito de compras
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 text-sm rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($items->isEmpty())
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center text-gray-500">
                    Tu carrito está vacío.
                    <a href="{{ route('home') }}" class="text-indigo-600 underline ml-1">
                        Ir al catálogo
                    </a>
                </div>
            @else
                <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                    @foreach ($items as $item)
                        <div class="flex items-center justify-between border-b pb-4 last:border-b-0 last:pb-0">

                            {{-- Izquierda: imagen + info --}}
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-gray-50 flex items-center justify-center rounded">
                                    <img src="{{ $item->telefono->imagen }}"
                                         alt="{{ $item->telefono->modelo }}"
                                         class="max-h-14 object-contain">
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-indigo-500 uppercase">
                                        {{ strtoupper($item->telefono->marca) }}
                                    </p>
                                    <p class="font-semibold text-gray-900">
                                        {{ $item->telefono->modelo }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        Cantidad en carrito:
                                        <span class="font-semibold">{{ $item->cantidad }}</span>
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        Máx. a eliminar: {{ $item->cantidad }}
                                    </p>
                                </div>
                            </div>

                            {{-- Derecha: precio + acciones --}}
                            <div class="text-right">
                                <p class="text-sm text-gray-500">
                                    Precio unitario:
                                    <span class="font-semibold">
                                        S/ {{ number_format($item->telefono->precio, 2) }}
                                    </span>
                                </p>
                                <p class="text-sm text-gray-700">
                                    Subtotal:
                                    <span class="font-semibold text-orange-500">
                                        S/ {{ number_format($item->subtotal, 2) }}
                                    </span>
                                </p>

                                {{-- Form eliminar N unidades --}}
                                <form action="{{ route('carrito.removeUnits', $item->id_carrito) }}"
                                      method="POST"
                                      class="mt-2 flex items-center justify-end gap-2">
                                    @csrf

                                    <input
                                        type="number"
                                        name="cantidad"
                                        min="1"
                                        max="{{ $item->cantidad }}"
                                        value="1"
                                        class="w-16 border rounded text-center py-0.5 text-sm"
                                    >

                                    <button type="submit"
                                            class="text-sm text-red-600 hover:text-red-700">
                                        Eliminar
                                    </button>
                                </form>

                                {{-- Eliminar todo --}}
                                <form action="{{ route('carrito.remove', $item->id_carrito) }}"
                                      method="POST"
                                      class="mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-xs text-red-500 hover:text-red-600">
                                        Eliminar todo
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-between items-center pt-4 border-t mt-4">
                        <a href="{{ route('home') }}" class="text-sm text-indigo-600 hover:underline">
                            ← Seguir comprando
                        </a>
                        <p class="text-lg font-semibold text-gray-900">
                            Total:
                            <span class="text-orange-500">
                                S/ {{ number_format($total, 2) }}
                            </span>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
