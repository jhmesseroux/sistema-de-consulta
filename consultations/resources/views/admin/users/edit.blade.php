<x-admin>
    {{-- <x-slot name="header" class="">
        Admin / Create Usuario
    </x-slot> --}}
    {{-- @include('auth.register') --}}
    <div class="w-full p-6 border-2  sm:w-4/6 m-auto bg-white shadow-md rounded">

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/admin/user/update/{{ $user->id }}">
            @csrf

            <h3 class="form-title gradient">Editar Usuario : {{ $user->id }}</h3>

            <x-input id="id" class="block mt-1 w-full" type="hidden" name="id" :value="$user->id" />
            <!-- DNI -->
            <div class="mt-4">
                <x-label for="dni" :value="__('DNI')" />

                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="$user->dni"
                    required autofocus />
            </div>
            <!-- legajo -->
            <div class="mt-4">
                <x-label for="legajo" :value="__('Legajo')" />
                <x-input id="legajo" class="block mt-1 w-full" type="text" name="legajo" :value="$user->legajo"
                    required />
            </div>
            <!-- firstname -->
            <div class="mt-4">
                <x-label for="firstname" :value="__('Nombre')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="$user->firstname"
                    required autofocus />
            </div>

            <!--lastname-->
            <div class="mt-4">
                <x-label for="lastname" :value="__('Apellido')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="$user->lastname"
                    required />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                    required autofocus />
            </div>
            <!-- Role -->
            <div class="mt-4">
                <x-label for="role_id" :value="__('Rol')" />
                <select
                    class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="role_id" id="role_id">
                    @foreach (App\Models\Role::all() as $role)
                        <option {{ $user->role->id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">
                            {{ $role->name }} </option>
                    @endforeach

                </select>

                {{-- <x-input id="role" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus /> --}}
            </div>

            <div class="mt-4 flex justify-end gap-6">
                <x-button title="Volver atrás" type='button' class="!bg-gray-400">
                    <a href="/admin/user">
                        Cancelar
                    </a>
                </x-button>
                <x-button title="Editar cuenta">
                    Editar
                </x-button>
            </div>
        </form>

    </div>

</x-admin>
