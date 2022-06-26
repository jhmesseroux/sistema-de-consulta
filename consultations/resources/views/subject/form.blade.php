<div class="subject-create">

    <input type="hidden" value="{{ isset($subject->id) ? $subject->id : '' }}" name="id" id="id">

    <div class="mt-4">
        <x-label for="name" :value="__('Nombre')" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
            value="{{ isset($subject->name) ? $subject->name : '' }}" required />
        <x-errorInput name='name' />
    </div>
    <div class="mt-4 flex justify-end gap-6">
        <x-button title="Volver Atras" type='button' class="!bg-gray-400">
            <a href="/admin/subjects">
                Cancelar
            </a>
        </x-button>
        <x-button title="Editar Materia" class="!bg-blue-600">
            {{ isset($subject->name) ? 'Editar' : 'Crear' }}
        </x-button>
    </div>

</div>
