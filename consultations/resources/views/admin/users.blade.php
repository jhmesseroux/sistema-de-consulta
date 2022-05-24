<x-admin>

    <x-slot name="header" class="">
        Admin /users
    </x-slot>

    <div class="mx-auto  container">
        <div class="header p-4 flex place-items-center gap-8 ">
            <span>Listado de usuarios({{ $users->count() }})</span>
            <a title="Agregar un nuevo Usuario" href="/admin/user/add">
                <x-button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </x-button>
            </a>

        </div>

        <div class="w-full overflow-x-auto xl:overflow-x-hidden">
            <table class="min-w-full bg-white shadow rounded">
                <thead class="p-4">
                    <tr class="w-full h-16 border-gray-300 border-b py-8">
                        <x-tables.th text='Avatar' class="pl-4" role="columnheader">
                        </x-tables.th>
                        <x-tables.th text='Legajo' role="columnheader">
                        </x-tables.th>
                        <x-tables.th text=' Nombre/Apellido' role="columnheader">
                        </x-tables.th>
                        {{-- <x-tables.th role="columnheader"
                            class="text-gray-600  font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Company Contact</x-tables.th> --}}
                        <x-tables.th text='Rol' role="columnheader">
                        </x-tables.th>
                        {{-- <x-tables.th text='Email' role="columnheader"> --}}
                        {{-- </x-tables.th> --}}
                        <x-tables.th text='Active'>
                        </x-tables.th>
                        <x-tables.th text='Accion' role="columnheader">
                        </x-tables.th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-gray-300 border-b">
                            <x-tables.td class="p-4">
                                @if ($user->avatar)
                                    <img class="rounded-full shadow-sm border-2 border-gray-2 w-9 h-9"
                                        src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->firstname }}">
                                @else
                                    <img class="rounded-full shadow-sm border-2 border-gray-2 w-9 h-9"
                                        src="{{ asset('storage/avatars/default-avatar.png') }}"
                                        alt="{{ $user->firstname }}">
                                @endif
                            </x-tables.td>
                            <x-tables.td>
                                {{ $user->legajo }}
                            </x-tables.td>
                            <x-tables.td>
                                {{ $user->lastname }} - {{ $user->firstname }}
                            </x-tables.td>
                            <x-tables.td>
                                {{ $user->role->name }}</x-tables.td>
                            {{-- <x-tables.td>
                                {{ $user->email }}
                            </x-tables.td> --}}
                            <x-tables.td>
                                {!! $user->verified ? "<div class='flex gap-1 items-center justify-center'> <span> Si</span> <span class='w-2 h-2 rounded-full bg-green-600'></span></div>" : "<div class='flex gap-1 items-center justify-center'> <span> No</span> <span class='w-2 h-2 rounded-full bg-red-600'></span></div>" !!}
                            </x-tables.td>
                            <x-tables.td>
                                <div class="place-items-center flex ">
                                    <a title="Editar Usuario" class="text-yellow-500 "
                                        href="/admin/user/edit/{{ $user->id }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg></a>
                                    <form class="inline" method="POST"
                                        action="/admin/user/delete/{{ $user->id }}">
                                        @csrf
                                        <x-button title="Borrar Usuario"
                                            class="text-red-500  !p-0 bg-transparent hover:bg-transparent  hover:text-red-700 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </x-button>
                                    </form>

                                    </a>
                                    @if (!$user->verified)
                                        <form class="inline" method="POST"
                                            action="/admin/{{ $user->id }}/verify">
                                            @csrf
                                            <x-button title="Verificar Cuenta"
                                                class="bg-green-500 !p-0  hover:bg-green-700 focus:bg-green-400 active:bg-green-700 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-widx-tables.th="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                                </svg>
                                            </x-button>
                                        </form>
                                    @endif
                            </x-tables.td>
        </div>

        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    </div>
    <div class="my-4">

        {{ $users->links() }}
    </div>

    <x-alert />
</x-admin>
