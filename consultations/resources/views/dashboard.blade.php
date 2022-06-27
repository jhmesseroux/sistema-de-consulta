<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl space-y-3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="gradient form-title mb-0"> Proximas Consultas </span>
                </div>
                @if ($nextMeetings->count())
                    <ul class="flex gap-4 p-4 bg-gray-100 items-center justify-center">
                        @foreach ($nextMeetings as $meet)
                            <li
                                class="flex border-b-2  overflow-hidden !w-60 border-b-blue-500 flex-col p-6 gap-2  hover:bg-blue-50 rounded shadow-md bg-white hover:shadow-lg
                        transition-shadow text-gray-900 duration-300 ">
                                <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 " viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                </svg>
                                <span class="capitalize">
                                    {{ $meet->consultation->subject->name }} : {{ $meet->consultation->time }}
                                </span>
                                <span>
                                    Salón:
                                    {{ $meet->consultation->place ?? '--' }}
                                </span>
                                <span>
                                    {{ Str::limit($meet->comment, 20, '...') }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="container w-full items-center justify-center p-6 m-4">
                        <p>
                            <x-nav-link class="text-blue-500" href="/meeting/user">Ver todas</x-nav-link>
                        </p>
                    </div>
                @else
                    <div class="container w-full items-center justify-center p-6 m-4">
                        <p class="border-l-4 border-red-500 p-4 w-4/5">
                            Aquí aparecerán las consultas que reserves.
                        </p>
                        <p>
                            <x-nav-link class="text-blue-500" href="/">Volver al inicio</x-nav-link>
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>
