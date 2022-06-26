<x-admin>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Materias
        </span>
    </x-slot>
    <br />
    <div class="mx-auto container bg-white   shadow rounded">
        <div class="header-table flex justify-start gap-4 items-center p-4">
            <h3>Listados de Materias</h3>
            <a class="flex gap-4 items-center justify-center" href="/admin/subject/create">
                <x-button class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>

                </x-button>
            </a>
        </div>
        <div class="w-full overflow-x-auto xl:overflow-x-hidden">
            <table class="min-w-full text-gray-800 bg-white">
                <thead>
                    <tr class="w-full h-16 border-gray-300 border-b py-8">
                        <x-tables.th class="pl-4" text='ID' />
                        <x-tables.th text='Nombre' />
                        <x-tables.th text='' />
                    </tr>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr class="p-6 border-gray-300 border-b">

                            <x-tables.td class="pl-4">

                                {{ $subject->id }}
                            </x-tables.td>
                            <x-tables.td>

                                {{ $subject->name }}
                            </x-tables.td>


                            <x-tables.td class="flex h-10 gap-2 items-center justify-center">
                                <a class="text-yellow-500 " href="/admin/subject/update/{{ $subject->id }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg></a>


                                <form class="inline" method="POST"
                                    action="/admin/subject/delete/{{ $subject->id }}}">
                                    @csrf
                                    @method('DELETE')
                                    <x-button title="Borrar Materia"
                                        class="text-red-500  !p-0 bg-transparent hover:bg-transparent  hover:text-red-700 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </x-button>
                                </form>
                            </x-tables.td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
    <div class="my-4">
        {{ $subjects->links() }}
    </div>
    <x-alert />
</x-admin>
