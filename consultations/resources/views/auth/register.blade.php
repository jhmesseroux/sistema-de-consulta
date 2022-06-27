<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="https://res.cloudinary.com/draxircbk/image/upload/v1653326573/sdc%20utn%202022/logo_lyig5s.png"
                alt="Sistema de Consulta UTN" width="170">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" class=" w-full sm:w-96" action="{{ route('register') }}">
            @csrf

            <h3 class="form-title gradient mb-0">Crear Cuenta</h3>


            <!-- DNI -->
            <x-field>


                <x-label for="dni" :value="__('DNI')" />

                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')"
                    required autofocus />
            </x-field>
            <!-- legajo -->
            <x-field>
                <x-label for="legajo" :value="__('Legajo')" />
                <x-input id="legajo" class="block mt-1 w-full" type="text" name="legajo" :value="old('legajo')"
                    required />
            </x-field>
            <!-- firstname -->
            <x-field>
                <x-label for="firstname" :value="__('Nombre')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')"
                    required autofocus />
            </x-field>

            <!--lastname-->
            <x-field>
                <x-label for="lastname" :value="__('Apellido')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"
                    required />
            </x-field>
            <!-- Email Address -->
            <x-field>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </x-field>
            <!-- Role -->
            <x-field>
                <x-label for="role_id" :value="__('Rol')" />
                <select
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="role_id" id="role_id">
                    @admin
                        @foreach (App\Models\Role::all() as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                        @endforeach
                    @else
                        @foreach (App\Models\Role::where('name', '<>', 'Admin')->get() as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                        @endforeach
                    @endadmin
                </select>

                {{-- <x-input id="role" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus /> --}}
            </x-field>

            <!-- Password -->
            <x-field>
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </x-field>
            <!-- Confirm Password -->
            <x-field>
                <x-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </x-field>



            <!-- Remember Me -->
            @cannot('admin')
                <x-field>
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                    </label>
                </x-field>
            @endcannot
            <div class="flex w-full my-3 justify-end">
                <x-button class=" place-items-center !text-center normal-case text-base font-normal">
                    Crear cuenta
                </x-button>
            </div>

            <div class="flex items-center justify-center gap-3 mt-4">
                @if (Route::has('password.request'))
                    <div class="flex gap-1 text-sm place-items-center">
                        <span>¿Ya tiene una cuenta?</span>
                        <a class="underline text-gray-600 hover:text-blue-600" href="{{ route('login') }}">
                            {{ __('Iniciar sesión') }}
                        </a>
                    </div>
                @endif



            </div>
        </form>
    </x-auth-card>
    <x-guest-footer />

</x-guest-layout>
