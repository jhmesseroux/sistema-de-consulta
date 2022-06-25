<x-admin>
    <x-slot name="header" class="">
        Admin /Create Usuario
    </x-slot>
    {{-- @include('auth.register') --}}
    <div class="w-full p-6 border-2  sm:w-4/6 m-auto bg-white shadow-md rounded">

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.store.user') }}">
            @csrf

            <h3 class="form-title gradient">Crear Cuenta</h3>


            <!-- DNI -->
            <div class="mt-4">
                <x-label for="dni" :value="__('DNI')" />

                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required
                    autofocus />
            </div>
            <!-- legajo -->
            <div class="mt-4">
                <x-label for="legajo" :value="__('legajo')" />
                <x-input id="legajo" class="block mt-1 w-full" type="text" name="legajo" :value="old('legajo')"
                    required />
            </div>
            <!-- firstname -->
            <div class="mt-4">
                <x-label for="firstname" :value="__('Nombre')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')"
                    required autofocus />
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

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>
            <!-- Role -->
            <div class="mt-4">
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
            @cannot('admin')
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
            @endcannot

            <div class="flex items-center justify-end mt-4">
                @cannot('admin')
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                @endcannot

                <div class="mt-4 justify-end flex gap-6">
                    <x-button title="Volver Atras" type='button' class="!bg-gray-400">
                        <a href="/admin/users">
                            Cancelar
                        </a>
                    </x-button>
                    <x-button class="!bg-blue-500">
                        Crear Cuenta
                    </x-button>
                </div>

            </div>
        </form>

    </div>

</x-admin>
