
    <div class="mx-auto container bg-white   shadow rounded">
        <div class="header-table flex justify-between gap-4 items-center p-4">
            <h3>Listado de consultas</h3>
            <x-button class="">
                <a class="flex gap-4 items-center justify-center" href="consultation/create">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>
                        Agregar
                    </span>
                </a>
            </x-button>
        </div>
        <div class="w-full overflow-x-auto xl:overflow-x-hidden">
            <table class="min-w-full text-gray-800 bg-white">
                <thead>
                    <tr class="w-full h-16 border-gray-300 border-b py-8">
                        <x-tables.th class="pl-4" text='ID' />
                        <x-tables.th text='teacher_id' />
                        <x-tables.th text='subject_id' />
                        <x-tables.th text='admin_id' />
                        <x-tables.th text='alternative' />
                        <x-tables.th text='active' />
                        <x-tables.th text='dayOfWeek' />
                        <x-tables.th text='link' />
                        <x-tables.th text='place' />
                        <x-tables.th text='reasonCancel' />
                        <x-tables.th text='time' />
                        <x-tables.th text='type' />
                    </tr>
                <tbody>
                    @foreach ($consultations as $consultation)
                        <tr class="p-6 border-gray-300 border-b">

                            <x-tables.td class="pl-4">  {{ $consultation->teacher_id }}  </x-tables.td>
                            <x-tables.td>               {{ $consultation->admin_id }}  </x-tables.td>
                            <x-tables.td>               {{ $consultation->subject_id }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->admin_id }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->alternative }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->active }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->link }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->place }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->reasonCancel }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->time }} </x-tables.td>
                            <x-tables.td>               {{ $consultation->type }} </x-tables.td>


                            <x-tables.td class="flex h-10 gap-2 items-center justify-center">
                                <a class="text-yellow-500 " href="consultation/update/{{ $consultation->id }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg></a>
                                <a class="text-red-500" href="consultation/update/{{ $consultation->id }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg></a>
                            </x-tables.td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>

