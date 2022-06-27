<x-admin aria-haspopup="dialog">

    <div id="modal-delete-rol" role="dialog" aria-modal="true"
        aria-labelledby="title-delete-rol" aria-live="assertive"
        class="fixed top-0 left-0 z-30 h-screen w-screen hidden">
        <div aria-hidden="true" class="overflow z-40"></div>
        <div class="content fixed flex w-full text-white !z-50 h-full">
            <div class="p-6 border-2 m-auto bg-white shadow-md rounded">
                <form id="delete-rol" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <h3 id="title-delete-rol" class="my-4 text-gray-800"></h3>
                    <div class="my-4 flex gap-6">
                        <x-button title="Cancelar" onclick="closeModalDelete()" type="button"
                            class="!bg-gray-400">
                            Cancelar
                        </x-button>
                        <x-button id="modal-button" title="Borrar rol" class="!bg-red-500">
                            Borrar denifitivamente
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mx-auto container">
        <div class="header p-4 flex place-items-center gap-8">
            <span>Listado de roles ({{ $roles->count() }})</span>
            <a title="Agregar un nuevo Rol" href="/admin/role/create">
                <x-button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </x-button>
            </a>

        </div>
        <div class="w-full overflow-x-auto xl:overflow-x-hidden">
            <table class="min-w-full text-gray-800  bg-white   shadow rounded">
                <thead>
                    <tr class="w-full h-16 border-gray-300 border-b py-8">
                        {{-- <x-tables.th class="pl-4" text='ID' /> --}}
                        <x-tables.th class="pl-4" text='Nombre' />
                        <x-tables.th text='Descripcion' />
                        <x-tables.th text='  ' />
                    </tr>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="p-6 border-gray-300 border-b">

                            {{-- <x-tables.td class="pl-4">

                                {{ $role->id }}
                            </x-tables.td> --}}
                            <x-tables.td class="pl-4">

                                {{ $role->name }}
                            </x-tables.td>
                            <x-tables.td>

                                {{ $role->description }}
                            </x-tables.td>
                            <x-tables.td
                                class="
                                flex h-10 gap-2 items-center justify-center">
                                @if ($role->name !== 'Admin' && $role->name !== 'Profesor' && $role->name !== 'Alumno')
                                    <a title="Editar Rol" class="text-yellow-500 "
                                        href="/admin/role/update/{{ $role->id }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg></a>
                                    <a title="Borrar Rol" class="text-red-500" href="#deleteRole"
                                        onclick="deleteRole({{ $role }})"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg></a>
                                @endif
                            </x-tables.td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
    <x-alert />
</x-admin>
