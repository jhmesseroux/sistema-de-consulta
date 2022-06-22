<x-app-layout>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Mis Consultas
        </span>
    </x-slot>


    @if ($meeting->count())
        <ul role="list" class="container m-auto divide-y my-4 p-4  divide-gray-300 ">
            @error('comment')
                <p class="p-2 text-red-500 my-4">{{ $message }}</p>
            @enderror
            @foreach ($meeting as $meet)
                <li
                    class="result-search-item p-3 sm:py-4 bg-white shadow hover:shadow-lg hover:rounded-sm cursor-pointer duration-300 hover:bg-blue-500 hover:!text-white ">
                    <div class="flex gap-2 sm:items-center sm:flex-row flex-col sm:space-x-4">

                        <div class="flex-1 min-w-0">
                            <p
                                class="text-sm my-1 font-medium text-blue-500 flex items-center gap-2 capitalize hover:text-gray-900 truncate">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span>
                                    {{ $meet->consultation->subject->name }}
                                </span>
                            </p>
                            <p class="text-sm flex gap-2 items-center text-gray-500 truncate ">
                                <span class="flex gap-2">
                                    <span>

                                        {{ $meet->consultation->dayOfWeek }} |
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <span>

                                    {{ $meet->consultation->time }}
                                </span>
                            </p>
                            <p class="text-sm flex gap-2 items-center text-gray-500 truncate ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>

                                    Salon :
                                    {{ $meet->consultation->place ?? '--' }}
                                </span>
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                            @if ($meet->active)
                                <x-button type='button' onclick="dothat({{ $meet }})">
                                    Cancelar
                                </x-button>
                            @endif
                        </div>
                    </div>

                    <div class="comment my-2">
                        <p class=" text-sm flex gap-3 items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <span>

                                {{ $meet->comment }}
                            </span>
                        </p>
                    </div>


                </li>
            @endforeach
        </ul>
    @else
        <div class="meettainer flex w-full items-center justify-center p-6 m-4">
            <p class="bg-gray-200 border-l-4 border-red-500 p-4 w-4/5">No hay resultado para <strong>
                    {{ request('search') }}. </strong>
                Volver al <x-nav-link class="text-blue-500" href="/">Inicio</x-nav-link>
            </p>
        </div>
    @endif
</x-app-layout>
