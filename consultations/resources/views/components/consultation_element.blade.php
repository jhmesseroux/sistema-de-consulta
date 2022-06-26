@props(['firstname','lastname','avatar','email','name','dayOfWeek','time','place','active','id'])

<li
    class="result-search-item p-3 sm:py-4 bg-white shadow hover:shadow-lg hover:rounded-sm cursor-pointer duration-300 hover:bg-blue-600 hover:!text-white ">
    <div class="flex gap-2 sm:items-center sm:flex-row flex-col sm:space-x-4">


        <div class="flex-shrink-0 flex items-center  gap-1">
            @if ($avatar)
            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $avatar) }}"
                alt="{{ $firstname . $lastname }}">
            @else
            <img class="rounded-full  shadow-sm border-2 border-gray-2 w-9 h-9"
                src="{{ asset('storage/avatars/default-avatar.png') }}" alt=" {{$firstname . $lastname }}">
            @endif
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    {{ $firstname }}
                </p>
                <p class="text-sm text-gray-500 truncate ">
                    {{ $email }}
                </p>
            </div>

        </div>

        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium capitalize text-gray-900 truncate">
                {{ $name }}
            </p>
            <p class="text-sm text-gray-500 truncate ">
                {{ $dayOfWeek }} |
                {{ $time }}
            </p>
            <p class="text-sm text-gray-500 truncate ">
                Salon :
                {{ $place }}
            </p>
        </div>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
            @if ($active)
            <x-button type='button' onclick="dothat({{ $id }})">
                Reservar
            </x-button>
            @else
            <x-button class="bg-red-500" type='button' disabled>
                Supendido
            </x-button>
            @endif
        </div>
    </div>
    @if (!$active)
    <div class="reason-cancel">
        <span class="p-1 text-sm text-red-300"> Esta consulta está suspendida por el momento!
        </span>
    </div>
    @endif


</li>
