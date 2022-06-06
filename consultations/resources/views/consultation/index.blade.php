<x-app-layout>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Consultas
        </span>
    </x-slot>
    <br />
    <div class="mx-auto container bg-white   shadow rounded">
        <div class="header-table flex justify-between gap-4 items-center p-4">
            <h3>Listado de consultas</h3>
            <x-button type="button">


                <a class="flex gap-4 items-center justify-rigt" href="{{ url('consultation/create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>
                        Agregar
                    </span>
                </a>
            </x-button>
      
            <x-button type="button">
                    <span>
                        Listar alumnos
                    </span>
                </a>
            </x-button>
            <x-button type="button">
                <span>
                    Dar de baja 
                </span>
            </a>
        </x-button>
  
      
            


        </div>
        <div class="w-full overflow-x-auto xl:overflow-x-hidden">
            <table class="min-w-full text-gray-800 bg-white">
                <thead>
                    <tr class="w-full h-16 border-gray-300 border-b py-8">
                        {{-- <x-tables.th class="pl-4" text='ID' /> --}}
                        <x-tables.th class="pl-4" text='Profesor' />
                        <x-tables.th text=' ' />
                        <x-tables.th text='Materia' />
                        <x-tables.th text='Admin' />
                        <x-tables.th text='Dia de la semana' />
                        <x-tables.th text='Fecha Alternativa' />
                        <x-tables.th text='Link' />
                        <x-tables.th text='Lugar' />
                        <x-tables.th text='Motivo de cancelación' />
                        <x-tables.th text='Hora' />
                        <x-tables.th text='Tipo' />
                        <x-tables.th text='Estado' />
                        <x-tables.th text=' ' />

                    </tr>
                <tbody>
                    @foreach ($consultations as $consultation)
                        <tr class="p-6 border-gray-300 border-b">
                            {{-- <x-tables.td class="pl-4"> {{ $consultation->id }} </x-tables.td> --}}
                            <x-tables.td class="pl-4" > {{ $consultation->p_firstname." ".$consultation->p_lastname }} </x-tables.td>
                            <x-tables.td>  <x-avatarIcon img="{{ $consultation->p_avatar }}" alt="icono profesor" /> </x-tables.td>
                            <x-tables.td> {{ $consultation->subject_name }} </x-tables.td>
                            <x-tables.td> {{ $consultation->a_firstname." ".$consultation->a_lastname }} </x-tables.td>
                            <x-tables.td> {{ $consultation->dayOfWeek }} </x-tables.td>
                            <x-tables.td> {{ $consultation->alternative }} </x-tables.td>
                            <x-tables.td> {{ $consultation->link }} </x-tables.td>
                            <x-tables.td> {{ $consultation->place }} </x-tables.td>
                            <x-tables.td> {{ $consultation->reasonCancel }} </x-tables.td>
                            <x-tables.td> {{ $consultation->time }} </x-tables.td>
                            <x-tables.td> {{ $consultation->type }} </x-tables.td>
                            <x-tables.td> {{ ($consultation->active)? 'Activada' :'De baja' }} </x-tables.td>


                            <x-tables.td class="flex h-10 gap-2 items-center justify-center">
                                <a class="text-yellow-500 "
                                    href="{{ url('consultation/update/' . $consultation->id . '') }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg></a>

                                    <a class="text-green-500"
                                    href="{{ url('consultation/information/' . $consultation->id . '') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                </a>
                                <a class="text-red-500"
                                    href="{{ url('consultation/delete/' . $consultation->id . '') }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>

                           
                              
                            </x-tables.td>
                        </tr>

              
                    @endforeach
                    {{-- PROBANDO --}}
                    @foreach ($consultations as $consultation)
                    <x-consultation_element     id="{{$consultation->id}}" 
                        firstname="{{$consultation->p_firstname}}"  
                        lastname="{{$consultation->p_lastname}}"
                        avatar = "{{$consultation->avatar}}"
                        dayOfWeek = "{{$consultation->dayOfWeek}}"
                        time = "{{$consultation->time}}"
                        />
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>

</x-app-layout>
