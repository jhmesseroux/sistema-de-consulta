<x-admin>

    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Consultas canceladas
        </span>
    </x-slot>
    <br />

    <main>

        <main class=" flex justify-center">

            <div class=" container bg-white  p-6 ">
                {{-- <x-button>
                    <-
                </x-button> --}}
                <h1 class="text-xl pb-4">Consultas canceladas de: <b class="text-xl font-medium pb-4">{{ $profesor['firstname'] }}
                    {{ $profesor['lastname'] }}</b> </h1>
                <div class="   ">
                    @if ($profesor['avatar'])
                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $profesor['avatar']) }}"
                    alt="foto del profesor {{ $profesor['firstname'] .$profesor['lastname'] }}">
                    @else
                    <img class="rounded-full  shadow-sm border-2 border-gray-2 w-9 h-9"
                        src="{{ asset('storage/avatars/default-avatar.png') }}"
                        alt="foto del profesor {{ $profesor['firstname'] .$profesor['lastname'] }}">
                    @endif
                    <div class="">
                        <p class="text-base text-gray-500 truncate ">
                            {{ $profesor['email'] }}
                        </p>
                    </div>
                    <br>
                    <br>

                    @foreach ($consultas as $item)

                    <div class="">
                        <p class="text-lg font-medium capitalize text-gray-900 truncate">
                            {{ $item->name }}
                        </p>
                        <p class="text-base text-gray-500 truncate ">
                            {{  $item->dayOfWeek }} |
                            {{ $item->time }} | Salón: {{ $item->place }}
                        </p>
                        <p class="text-sm text-gray-500 truncate ">

                        </p>
                    </div>
                    <div class=" w-full overflow-x-auto xl:overflow-x-hidden">
                        <table class="min-w-full text-gray-800 bg-white">
                            <thead>
                                <tr class="w-full h-16 border-gray-300 border-b py-8">
                                    <x-tables.th text='Dia' class="pl-4" />
                                    <x-tables.th text='Motivo' />
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->razones as $razon)
                                <tr class="p-6  h-10 border-gray-300 border-b">

                                    <x-tables.td class="pl-4  pb-3" style="width:20%"> {{ $razon->created_at }}
                                    </x-tables.td>
                                    <x-tables.td class="pb-3">{{$razon->reasonCancel}}</x-tables.td>

                                </tr>


                                @endforeach
                            </tbody>
                        </table>
                        <br />
                    </div>
                    @endforeach
        </main>
    </main>


</x-admin>
