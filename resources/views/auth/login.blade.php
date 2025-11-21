<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="text-xl font-bold text-center mb-4">Iniciar sesión</h2>
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email"
                          name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Recordarme') }}
                </span>
            </label>
        </div>
        <div class="mt-4 flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:underline"
                   href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <div class="mt-6 flex items-center justify-between">
            <span class="text-sm text-gray-600">¿No tienes cuenta?</span>

            <div class="flex gap-2">
                <a href="{{ route('register') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm">
                    Regístrate
                </a>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm">
                    Ingresar
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
