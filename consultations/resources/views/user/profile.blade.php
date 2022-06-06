<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>
    <div
        class="user-profile  w-full my-4 p-6 rounded bg-white border-2 border-gray-200 m-auto lg:w-6/12 xl:w-96 sm:w-9/12 md:w-7/12">

        <form method="POST" enctype="multipart/form-data" class="" action="/user/update">
            @csrf


            <!-- DNI -->
            <div class="dni-legajo flex justify-between gap-6">
                <x-field>
                    <x-label for=" dni" :value="__('DNI')" />

                    <x-input readonly id="dni" class="block mt-1 w-full bg-gray-200" type="text" name="dni"
                        value="{{ Auth::user()->dni }}" required autofocus />
                    @error('dni')
                        <p>{{ $message }}</p>
                    @endError

                </x-field>
                <x-field>
                    <x-label for="legajo" :value="__('Legajo')" />
                    <x-input id="legajo" readonly class="block mt-1 w-full bg-gray-200" type="text" name="legajo"
                        value="{{ Auth::user()->legajo }}" required />
                    @error('legajo')
                        <p>{{ $message }}</p>
                    @endError
                </x-field>
            </div>
            <!-- legajo -->

            <!-- firstname -->
            <div class="lastname-firstname flex justify-between gap-6">

                <x-field>
                    <x-label for="firstname" :value="__('Nombre')" />

                    <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname"
                        value="{{ Auth::user()->firstname }}" required />
                    @error('furstname')
                        <p>{{ $message }}</p>
                    @endError
                </x-field>

                <!--lastname-->
                <x-field>
                    <x-label for="lastname" :value="__('Apellido')" />

                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                        value="{{ Auth::user()->lastname }}" required />
                    @error('lastname')
                        <p>{{ $message }}</p>
                    @endError
                </x-field>
            </div>
            <!-- Avatar -->
            <x-field>
                <x-label for="foto" :value="__('Foto')" />
                <div class="mt-1 flex items-center">
                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                        @if (Auth::user()->avatar)
                            <img class="rounded-full  shadow-sm border-2 border-gray-2"
                                src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                alt="{{ Auth::user()->firstname }}">
                        @else
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        @endif

                    </span>
                    <x-label
                        class=" ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        for='avatar' :value="'Cambiar'" />
                    <input type="file" onchange="PreviewAvatar(this)" name="avatar" id="avatar" class="hidden ">
                </div>
                <div class="hidden flex p-4 bg-gray-200 items-center my-4 gap-3 preview-box">
                    <img src="" id="imagePreview" class="imagePreview w-12" alt="previewImage">
                    <span class="filename"></span>
                </div>
            </x-field>

            <!-- Email Address -->
            <x-field class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                    value="{{ Auth::user()->email }}" required />
                @error('email')
                    <p>{{ $message }}</p>
                @endError
            </x-field>
            <!-- Role -->
            @if (Auth::user()->role->name === 'Admin')
                <x-field class="mt-4">
                    <x-label for="role_id" :value="__('Rol')" />
                    <select
                        class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="role_id" id="role_id">
                        @foreach (App\Models\Role::all() as $role)
                            <option value="{{ $role->id }}"
                                {{ Auth::user()->role->id == $role->id ? 'selected' : '' }}> {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </x-field>
            @endif


            <x-field>
                <x-button>
                    {{ __('Guardar') }}
                </x-button>
            </x-field>
        </form>
    </div>


</x-app-layout>
