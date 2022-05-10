<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajustes') }}
        </h2>
    </x-slot>
    <div
        class="user-profile container  w-full my-4 p-6 rounded bg-white border-2 border-gray-200 m-auto lg:w-6/12 xl:w-96 sm:w-9/12 md:w-7/12">
        {{-- <div class="mt-1">
            <label class="inline-flex items-center">
                <input type="checkbox" class="form-checkbox h-6 w-6">
                <span class="ml-3 text-lg">Option 2</span>
            </label>
        </div> --}}
        <span class="form-title">Email Preferencias</span>
        <div class="">

            <label for="small-toggle" class="inline-flex relative items-center mb-5 cursor-pointer">
                <input type="checkbox" value="" id="small-toggle" class="sr-only peer">
                <div
                    class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all  peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 ">Recibir Email sobre novedades</span>
            </label>
            <label for="small-toggle1" class="inline-flex relative items-center mb-5 cursor-pointer">
                <input type="checkbox" value="" id="small-toggle1" class="sr-only peer">
                <div
                    class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all  peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 ">Notificarme al cancelar
                    consultas</span>
            </label>
            <label for="small-toggle2" class="inline-flex relative items-center mb-5 cursor-pointer">
                <input type="checkbox" value="" id="small-toggle2" class="sr-only peer">
                <div
                    class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all  peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 ">Recordatorio de las consultas </span>
            </label>
        </div>
    </div>


</x-app-layout>
