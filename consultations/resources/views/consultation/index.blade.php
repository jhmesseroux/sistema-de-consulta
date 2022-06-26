<div class="mx-auto  container">
    <div class="header p-4 flex place-items-center gap-8 ">
        <span>Listado de consultas ({{ $consultations->count() }})</span>
        <a title="Agregar una nueva consulta" href="{{ url('consultation/create') }}">
            <x-button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </x-button>
        </a>
        <div class="">


            @if(Auth::user()->role_id == 1)

            @else


                {{-- <x-button type="button" title="Listar todos los alumnos">
                            <span>
                                Listar alumnos
                            </span>

                        </x-button> --}}
                <x-button type="button" title="Darse de baja todas las consultas"  onclick="darDeBaja({{ Auth::user()->id }})">
                    <span>
                        Darse de baja
                    </span>

                </x-button>

                <div id="modal-dar-baja" class="fixed top-0 left-0 z-30 h-screen w-screen hidden ">
                    <div class="overflow  z-40 ">

                    </div>
                    <div class="content fixed flex w-full text-white !z-50 h-full">
                        <div class="p-6 border-2   m-auto bg-white shadow-md rounded">
                            <div class="">


                                <form id="dar-baja" action="" method="GET">
                                    @csrf
                                    <h3 id="title-dar-baja" class="my-4 text-gray-800"></h3>
                                    <div class="my-4 flex gap-6">
                                        <x-button title="Volver Atras" onclick="closeModalBaja()" type='button'
                                            class="!bg-gray-400">
                                            Volver
                                        </x-button>
                                        <x-button title="Darse de baja" class="!bg-red-500">
                                            Darme de baja
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




            @endif
        </div>
        </a>

    </div>


    <div class="mx-auto container bg-white   shadow rounded">
        <div class="header-table flex justify-between gap-4 items-center p-4">

        </div>
        <div class="w-full overflow-x-auto xl:overflow-x-hidden">
            <table class="min-w-full text-gray-800 bg-white">
                <thead>
                    <tr class="w-full h-16 border-gray-300 border-b py-8">
                        @if(Auth::user()->role_id == 1)
                            <x-tables.th class="pl-4" colspan="2" text='Profesor' />
                            <x-tables.th text='Materia' />
                        @else

                            <x-tables.th class="pl-4" text='Materia' />
                        @endif


                        {{-- <x-tables.th text='Admin' /> --}}
                        <x-tables.th text='Dia' />
                        <x-tables.th text='Hora' />
                        <x-tables.th text='Tipo' />
                        <x-tables.th text='Lugar o link' />
                        {{-- <x-tables.th text='Link' /> --}}
                        {{-- <x-tables.th text='Motivo de cancelación' /> --}}
                        <x-tables.th text='Fecha Alternativa' />
                        <x-tables.th text='Estado' />
                        <x-tables.th text=' ' />

                    </tr>
                <tbody>
                    @foreach($consultations as $consultation)
                        <tr class="p-6 border-gray-300 border-b">
                            @if(Auth::user()->role_id == 1)
                                <x-tables.td class="pl-4" style="width:90px">
                                    <x-avatarIcon avatar="{{ $consultation->p_avatar }}"
                                        alternative="foto del profesor {{ $consultation->p_firstname }} {{ $consultation->p_lastname }}" />
                                </x-tables.td>
                                <x-tables.td class="pl-4">
                                    {{ $consultation->p_firstname." ".$consultation->p_lastname }}
                                </x-tables.td>
                                <x-tables.td> {{ $consultation->subject_name }} </x-tables.td>
                            @else

                                <x-tables.td class="pl-4"> {{ $consultation->subject_name }} </x-tables.td>
                            @endif

                            {{-- <x-tables.td> {{ $consultation->a_firstname." ".$consultation->a_lastname }}
                            </x-tables.td> --}}
                            <x-tables.td> {{ $consultation->dayOfWeek }} </x-tables.td>
                            <x-tables.td> {{ $consultation->time }} </x-tables.td>
                            <x-tables.td> {{ $consultation->type }} </x-tables.td>
                            @if($consultation->type == "Virtual")
                                <x-tables.td> {{ $consultation->link }} </x-tables.td>

                            @else
                                <x-tables.td> {{ $consultation->place }} </x-tables.td>

                            @endif
                            {{-- <x-tables.td> {{ $consultation->reasonCancel }} </x-tables.td> --}}
                            <x-tables.td> {{ $consultation->alternative }} </x-tables.td>
                            <x-tables.td>
                                {{ ($consultation->active)? 'Activada' :'De baja' }}
                            </x-tables.td>


                            <x-tables.td class="flex h-10 gap-2 items-center justify-center">
                                <a class="text-yellow-500 " title="Editar consulta"
                                    href="{{ url('consultation/update/' . $consultation->id . '') }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <a class="text-green-500" title="Ver inscriptos a la consulta"
                                    href="{{ url('consultation/information/' . $consultation->id . '') }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                                {{-- <a class="text-red-500" title="Eliminar consulta"
                                    href="{{ url('consultation/delete/' . $consultation->id . '') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </a> --}}



                            </x-tables.td>
                        </tr>


                    @endforeach

                </tbody>
                </thead>
            </table>
            {{-- PROBANDO --}}
            {{-- @foreach ($consultations as $consultation)
                              <x-consultation_element id="{{ $consultation->id }}"
            firstname="{{ $consultation->p_firstname }}"
            lastname="{{ $consultation->p_lastname }}"
            avatar="{{ $consultation->avatar }}"
            dayOfWeek="{{ $consultation->dayOfWeek }}"
            time="{{ $consultation->time }}"
            email="{{ $consultation->email }}"
            name="{{ $consultation->subject_name }}"
            place="{{ $consultation->place }}"
            active="{{ $consultation->subject_name }}"


            />
            @endforeach--}}
        </div>
    </div>
    <br>
