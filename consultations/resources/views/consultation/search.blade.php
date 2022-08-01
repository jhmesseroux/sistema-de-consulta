<x-app-layout aria-haspopup="dialog">

    <x-slot name="header">
        Resultado(s) para
        <span class="font-bold text-gray-700">
            {{ request('search') }} ({{ $consultations->count() }})
        </span>
    </x-slot>

    @if ($consultations->count())
        <ul role="list" class="container m-auto divide-y my-4 p-4  divide-gray-300 ">
            @error('comment')
                <p class="p-2 text-red-500 my-4">{{ $message }}</p>
            @enderror
            @foreach ($consultations as $con)
                <li
                    class="result-search-item p-3 sm:py-4 bg-white hover:bg-gray-100 shadow hover:shadow-lg hover:rounded-sm cursor-default duration-300">
                    <div class="flex gap-2 sm:items-center sm:flex-row flex-col sm:space-x-4">


                        <div class="flex-shrink-0 flex items-center gap-1">
                            @if ($con->avatar)
                                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $con->avatar) }}"
                                    alt=" {{ $con->firstname . $con->lastname }}">
                            @else
                                <img class="rounded-full  shadow-sm border-2 border-gray-2 w-9 h-9"
                                    src="{{ asset('storage/avatars/default-avatar.png') }}"
                                    alt=" {{ $con->firstname . $con->lastname }}">
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $con->firstname }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $con->email }}
                                </p>
                            </div>

                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium capitalize text-gray-900">
                                {{ $con->name }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ $con->dayOfWeek }} {{ $con->diaDeConsulta }} a las
                                {{ $con->time }}
                            </p>
                            <p class="text-sm text-gray-500">
                                Salón:
                                {{ $con->place }}
                            </p>
                        </div>
                        @if (Auth::user()?->role?->name != 'Admin')
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                @if ($con->active)
                                    <x-button type='button'
                                        onclick="dothat({{ $con->id }}, '{{ $con->dateConsultation }}')">
                                        Reservar
                                    </x-button>
                                @else
                                    <x-button class="!bg-red-500" type='button' disabled>
                                        Supendido
                                    </x-button>
                                @endif
                            </div>
                        @endif
                    </div>
                    @if (!$con->active)
                        <div class="reason-cancel">
                            <span class="p-1 text-sm text-red-300"> Esta consulta está suspendida por el momento!
                            </span>
                        </div>
                    @endif
                </li>
            @endforeach
            <div class="my-4 p-2">
                {{ $consultations->links() }}
            </div>

        </ul>
    @else
        <div class="container flex w-full items-center justify-center p-6 m-4">
            <p class="bg-gray-200 border-l-4 border-red-500 p-4 w-4/5">
                No hay resultado para <strong>{{ request('search') }}</strong>.
                <x-nav-link class="text-blue-500" href="/">Volver al inicio</x-nav-link>
            </p>
        </div>
    @endif

    {{-- Modal de reserva --}}
    <div id="confirm-consultation-modal" role="dialog" aria-modal="true" aria-labelledby="title-delete-rol"
        aria-live="assertive" tabindex="-1"
        class="overflow-y-auto hidden flex overflow-x-hidden fixed bg-overlay top-0 right-0 left-0 z-50 w-full min-h-screen md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-gray-100 shadow-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal()" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form action="/meeting/save" method="POST" id="reserva-consultation"
                    class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8">
                    @csrf
                    <input type="hidden" name="consultation_id" id="idConsultation">
                    <input type="hidden" name="dateConsultation" id="dateConsultation">
                    <h3 id="title-modal" class="text-xl font-medium text-gray-900">Confirma tu consulta</h3>
                    <div>
                        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Descripción
                        </label>
                        <textarea onkeyup="updateCounter()" minlength="5" type="text" name="comment" id="comment" maxlength="100"
                            class="bg-gray-50 h-20 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Breve descripcion de la duda" required modal-focus></textarea>
                        <div class="flex justify-between items-center">
                            <span id="comment-error" class="text-red-400 hidden p-1">Debe ingresar entre 5 a 100
                                caracteres.
                            </span>
                            <span class="self-end">
                                <span id="counter" class="">0</span>
                                <span>
                                    /100
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-4 justify-end items-center self-end flex-end">
                        <x-button onclick="closeModal()"
                            class="!bg-gray-100 duration-200 hover:!bg-gray-300 !text-gray-700" type="button">
                            Cancelar
                        </x-button>
                        <x-button id="confirm" type="submit">
                            Confirmar
                        </x-button>

                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
