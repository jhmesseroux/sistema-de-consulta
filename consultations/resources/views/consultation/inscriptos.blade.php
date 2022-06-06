<x-app-layout>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Listado de Alumnos
        </span>
    </x-slot>

    <body class="bg-white-500">
        sadas
    </body>

    <div class="w-full overflow-x-auto xl:overflow-x-hidden">
        <table class="min-w-full text-gray-800 bg-white">
            <thead>
                <tr class="w-full h-16 border-gray-300 border-b py-8">
                    <x-tables.th class="pl-4" text='Alumno' />
                    <x-tables.th text='foto? ' />
                    <x-tables.th text='razon' />
                </tr>
            <tbody>
                @foreach ($meetings as $meet)
                    <tr class="p-6 border-gray-300 border-b">
                    
                        <x-tables.td class="pl-4" > {{ $meet->firstname." ".$meet->lastname }} </x-tables.td>
                        <x-tables.td>  <x-avatarIcon img="{{ $meet->avatar }}" alt="icono profesor" /> </x-tables.td>
                        <x-tables.td> {{ '$meet->subject_name' }} </x-tables.td>
          

                        <x-tables.td class="flex h-10 gap-2 items-center justify-center">
                                <a class="text-green-500"
                                href="{{ url('consultation/information/' . $meet->id . '') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                            </a>
                        </x-tables.td>
                    </tr>

          
                @endforeach
</x-app-layout>
