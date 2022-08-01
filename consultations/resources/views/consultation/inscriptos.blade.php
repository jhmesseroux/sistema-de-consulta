<x-app-layout>
    <x-slot name="header">
        <span class="font-bold text-gray-700 flex gap-4 place-items-center">
            <a href="/consultation" class="text-blue-700 underline ">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
              </svg>  --}}
              <span>Mis consultas</span> </a> > Alumnos inscriptos
        </span>
    </x-slot>
    <br/><br/>
    <main class=" flex justify-center">



        <div class=" container bg-white  p-6 ">
            @foreach ($consultations as $item)
            {{-- <x-consultation_element firstname="{{$item->firstname}}" lastname="{{$item->lastname}}"
            $avatar="{{$item->avatar}}" $email="{{$item->email}}" $name="{{$item->name}}"
            $dayOfWeek="{{$item->dayOfWeek}}" $time="{{$item->time}}" $place="{{$item->place}}"
            $active="{{$item->active}}" $id="{{$item->id}}" /> --}}
            <h1 class="text-xl">Tu consulta</h1>
            <div >
                <div class="flex gap-2 sm:items-center sm:flex-row flex-col sm:space-x-4">


                    <div class="flex-shrink-0 flex items-center  gap-1">
                        @if ($item->avatar)
                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $item->avatar) }}"
                            alt="{{ $item->firstname . $item->lastname }}">
                        @else
                        <img class="rounded-full  shadow-sm border-2 border-gray-2 w-9 h-9"
                            src="{{ asset('storage/avatars/default-avatar.png') }}"
                            alt=" {{$item->firstname . $item->lastname }}">
                        @endif
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $item->firstname }}
                            </p>
                            <p class="text-sm text-gray-500 truncate ">
                                {{ $item->email }}
                            </p>
                        </div>

                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium capitalize text-gray-900 truncate">
                            {{ $item->name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate ">
                            {{  $item->dayOfWeek }} |
                            {{ $item->time }}
                        </p>
                        <p class="text-sm text-gray-500 truncate ">
                            Salon :
                            {{ $item->place }}
                        </p>
                    </div>



                </div>

            </div>

            <br/>

            @if ($cantidad)


            <h1 class="text-xl">Alumnos incriptos ({{$cantidad}})</h1>
            <div class=" w-full overflow-x-auto xl:overflow-x-hidden">
                <table class="min-w-full text-gray-800 bg-white">
                    <thead>
                        <tr class="w-full h-16 border-gray-300 border-b py-8">
                            <x-tables.th text=' Alumno' class="pl-4" colspan="3" />
                            <x-tables.th text='Motivo de consulta' />
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meetings as $meet)
                        <tr class="p-6  border-gray-300 border-b">

                            <x-tables.td class="pl-4 pb-3"   >
                                <x-avatarIcon avatar="{{$meet->avatar}}" alternative="icono profesor" />
                            </x-tables.td>
                            <x-tables.td class=" pb-3" colspan="2" >  {{ $meet->firstname }}  {{ $meet->lastname }} </x-tables.td>
                            {{-- <x-tables.td class=" pb-3" > </x-tables.td> --}}
                            <x-tables.td class=" pb-3 ">
                                <p class="text-base">{{ $meet->comment }}</p>
                            </x-tables.td>



                        </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p>No hay inscriptos para esta consulta</p>
            @endif
            @endforeach
    </main>
    <br/><br/>
</x-app-layout>
