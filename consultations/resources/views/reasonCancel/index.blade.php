<x-admin>

    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Consultas canceladas
        </span>
    </x-slot>
    <br />

    <main>



        <div class="mx-auto  container">
            <div class="header p-4 flex place-items-center gap-8 ">
                <span>Listado de consultas canceladas </span>
                {{-- <a title="Agregar una nueva consulta"  href="">aaa</a> --}}


            </div>


            <div class="mx-auto container bg-white   shadow rounded">
                <div class="header-table flex justify-between gap-4 items-center p-4">

                </div>
                <div class="w-full overflow-x-auto xl:overflow-x-hidden">
                    <table class="min-w-full text-gray-800 bg-white">
                        <thead>
                            <tr class="w-full h-16 border-gray-300 border-b py-8">


                                <x-tables.th class="pl-4" text='Profesor' colspan="2" />
                                {{-- <x-tables.th class="" text=' ' /> --}}
                                <x-tables.th class="" text='Ultima consulta cancelada' />
                                <x-tables.th class="" text='Cantidad' style="width:10%" />
                                <x-tables.th class="" text=' ' />

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultasCanceladas as $consulta)
                            <tr class="w-full h-10 py-6 border-gray-300 border-b">
                                <x-tables.td   class="pl-4"  style="width:100px">
                                    <x-avatarIcon avatar="{{ $consulta->avatar }}"
                                        alternative="foto del profesor {{ $consulta->firstname}} {{$consulta->lastname }}" />
                                </x-tables.td>
                                <x-tables.td style="width:30%"> {{$consulta->firstname}} {{$consulta->lastname}}
                                </x-tables.td>
                                <x-tables.td>{{$consulta->diaCancelado}}</x-tables.td>
                                <x-tables.td style="width:10%">{{$consulta->cantidad}}</x-tables.td>
                                <x-tables.td>
                                    <a class="text-green-500" title="Ver todas las consultas canceladas"
                                        href="{{ url('admin/reasonCancel/' . $consulta->teacher_id . '') }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>

                                </x-tables.td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <br>




    </main>


</x-admin>
