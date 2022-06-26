<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="https://res.cloudinary.com/draxircbk/image/upload/v1653326573/sdc%20utn%202022/logo_lyig5s.png"
                    alt="SDC UTN 2022" width="200">

            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="w-full sm:w-96" method="POST" action="{{ route('login') }}">
            @csrf
            <h3 class="form-title gradient mb-0">iniciar sesión</h3>

            <x-input id="verified" class="block mt-1 w-full" type="hidden" name="verified" value="1" />
            <!-- Email Address -->
            <x-field>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </x-field>




            <!-- Password -->
            <x-field>
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </x-field>

            <!-- Remember Me -->
            <x-field>
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </x-field>
            <div class="flex w-full my-3 justify-end">
                <x-button class=" place-items-center !text-center normal-case text-base font-normal">
                    Iniciar sesión
                </x-button>
            </div>

            <div class="flex flex-col items-center gap-3 justify-center mt-4">
                @cannot('admin')
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                @endcannot
                @if (Route::has('password.request'))
                    <div class="text-sm ">
                        <span>¿Nuevo en SDC UTN? </span>
                        <a class="underline text-gray-600 hover:text-blue-600" href="{{ route('register') }}">
                            {{ __('Registrate') }}
                        </a>
                    </div>
                @endif


            </div>
        </form>
    </x-auth-card>
    <x-guest-footer />
</x-guest-layout>
