<div class="flex justify-center  mt-10 sm:mt-0 ">
    <div class="md:grid md:grid-cols-3  place-content-center md:gap-6">

        <div class=" md:col-span-12">


            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">


                <input type="hidden" value="{{ isset($subject->id)? $subject->id: '' }}" name="id" id="id">

                <x-field>
                    <x-label for="name">Nombre</x-label>
                    <x-input type="text" value="{{ isset($subject->name)? $subject->name : '' }}" name="name" id="name"
                        placeholder="Ingrese un nombre" autocomplete="subjects_name"/>
                    @error('name')
                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                    @enderror
                </x-field>


                <br />

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                    <x-button type="button" class="bg-red-500">Cancelar</x-button>
                    <x-button type="submit">Guardar</x-button>


                </div>

            </div>
        </div>
    </div>
</div>
    </div>

