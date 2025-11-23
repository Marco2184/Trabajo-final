<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- LOGO --}}
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">
                    PhoneShop
                </a>
            </div>

            {{-- DERECHA: Buscador + botones --}}
            <div class="flex items-center space-x-3">

                {{-- BUSCADOR --}}
                <form action="{{ route('home') }}" method="GET" class="flex">
                    <input 
                        type="text" 
                        name="q"
                        placeholder="Buscar modelo o marca..."
                        value="{{ request('q') }}"
                        class="border rounded-l px-3 py-1 text-sm w-48"
                    >
                    <button 
                        class="bg-indigo-600 text-white px-4 py-1 rounded-r text-sm hover:bg-indigo-700">
                        Buscar
                    </button>
                </form>

                {{-- USUARIO LOGUEADO --}}
                @auth
                    {{-- LINK AL CARRITO --}}
                    <a href="{{ route('carrito.index') }}" 
                       class="px-3 py-1 text-sm border rounded hover:bg-gray-100">
                        🛒 Mi carrito
                    </a>

                    {{-- DROPDOWN USUARIO --}}
                    <div class="relative">
                        <button 
                            onclick="dropdownUser.toggle()" 
                            class="flex items-center text-gray-700 text-sm font-medium focus:outline-none">

                            Hola, {{ Auth::user()->nombre }}

                            <svg class="ml-1 h-4 w-4" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.23 7.21a.75.75 0 011.06.02L10 11.126l3.71-3.896a.75.75 0 111.08 1.04l-4.25 4.462a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                      clip-rule="evenodd" />
                            </svg>
                        </button>

                        {{-- CONTENIDO DEL DROPDOWN --}}
                        <div id="dropdownUser" 
                             class="hidden absolute right-0 mt-2 w-40 bg-white shadow rounded py-2 z-50">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button 
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>

                    <script>
                        const dropdownUser = {
                            toggle() {
                                document.getElementById('dropdownUser').classList.toggle('hidden')
                            }
                        }
                    </script>

                @endauth

                {{-- INVITADO --}}
                @guest
                    <a href="{{ route('login') }}" 
                       class="px-3 py-1 text-sm border rounded hover:bg-gray-100">
                        Ingresar
                    </a>

                    <a href="{{ route('register') }}" 
                       class="px-3 py-1 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Registrarse
                    </a>
                @endguest

            </div>

        </div>
    </div>
</nav>
