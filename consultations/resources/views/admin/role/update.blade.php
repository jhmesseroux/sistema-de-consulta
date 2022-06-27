<x-admin>

    <div class="w-full p-6 border-2  sm:w-4/6 m-auto bg-white shadow-md rounded">
        <div class="role-create">
            <form action="/admin/role/save/{{ $role->id }}" method="post">
                @csrf
                <h3 class="form-title mb-0 gradient">Editar Rol {{ $role->id }}</h3>
                <input type="hidden" value="{{ $role->id }}" name="id" id="name">

                <div class="mt-4">
                    <x-label for="name" :value="__('Nombre')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ $role->name }}" required autofocus />
                    @error('name')
                        <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <x-label for="description" :value="__('Descripción')" />
                    <x-input id="description" class="block mt-1 w-full" type="text"
                        value="{{ $role->description }}" name="description" required />
                    @error('description')
                        <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4 flex justify-end gap-6">
                    <x-button title="Volver atrás" type='button' class="!bg-gray-400">
                        <a href="/admin/role">
                            Cancelar
                        </a>
                    </x-button>
                    <x-button title="Editar rol">
                        Editar
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-admin>
