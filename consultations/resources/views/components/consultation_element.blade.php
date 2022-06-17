
<li
    class="{{( isset($class))? $class : 
        "result-search-item p-3 sm:py-4 bg-white shadow hover:shadow-lg hover:rounded-sm cursor-pointer duration-300 hover:bg-blue-500 hover:!text-white"
        }}">
    <div class="flex gap-2 sm:items-center sm:flex-row flex-col sm:space-x-4">


        <div class="flex-shrink-0 flex items-center  gap-1">
            @if ($consultation->avatar)
            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $consultation->avatar) }}"
                alt="{{ $consultation->firstname . $consultation->lastname }}">
            @else
            <img class="rounded-full  shadow-sm border-2 border-gray-2 w-9 h-9"
                src="{{ asset('storage/avatars/default-avatar.png') }}" alt=" {{$consultation->firstname . $consultation->lastname }}">
            @endif
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    {{ $consultation->firstname }}
                </p>
                <p class="text-sm text-gray-500 truncate ">
                    {{ $consultation->email }}
                </p>
            </div>

        </div>

        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium capitalize text-gray-900 truncate">
                {{ $consultation->subject_name }}
            </p>
            <p class="text-sm text-gray-500 truncate ">
                {{ $consultation->dayOfWeek }} |
                {{ $consultation->time }}
            </p>
            <p class="text-sm text-gray-500 truncate ">
                Salon :
                {{ $consultation->place }}
            </p>
        </div>
        @if (isset($modo) && $modo == "edicion")
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
        @else
        <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
            @if ($consultation->active)
            <x-button type='button' onclick="dothat({{ $consultation->id }})">
                Reservar
            </x-button>
            @else
            <x-button class="bg-red-500" type='button' disabled>
                Supendido
            </x-button>
            @endif
        </div>
            
        @endif
    </div>
    @if (!$consultation->active)
    <div class="reason-cancel">
        <span class="p-1 text-sm text-red-300"> Esta consulta está suspendida por el momento!
        </span>
    </div>
    @endif


</li>
