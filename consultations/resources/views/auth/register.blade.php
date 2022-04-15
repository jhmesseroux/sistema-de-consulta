<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <!-- DNI -->
            <div class="mt-4">
                <x-label for="dni" :value="__('DNI')" />

                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required
                    autofocus />
            </div>
            <!-- legajo -->
            <div class="mt-4">
                <x-label for="legajo" :value="__('legajo')" />
                <x-input id="legajo" class="block mt-1 w-full" type="text" name="legajo" :value="old('legajo')" required />
            </div>
            <!-- firstname -->
            <div class="mt-4">
                <x-label for="firstname" :value="__('Nombre')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required
                    autofocus />
            </div>

            <!--lastname-->
            <div class="mt-4">
                <x-label for="lastname" :value="__('Apellido')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"
                    required />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>
            <!-- Role -->
            <div class="mt-4">
                <x-label for="role_id" :value="__('Rol')" />
                <select
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="role_id" id="role_id">
                    @foreach (App\Models\Role::all() as $role)
                        <option value="{{ $role->id }}"> {{ $role->name }} </option>
                    @endforeach
                </select>

                {{-- <x-input id="role" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus /> --}}
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>



            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Crear Cuenta') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
