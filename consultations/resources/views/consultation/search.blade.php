<x-app-layout>
    <x-slot name="header">
        Resultado(s) para
        <span class="font-bold text-gray-700">
            {{ request('search') }} ({{ $consultations->count() }})
        </span>
    </x-slot>

    {{-- modal confirm --}}

    <div id="confirm-condultation-modal" tabindex="-1" aria-hidden="true"
        class="overflow-y-auto hidden flex overflow-x-hidden fixed bg-overlay top-0 right-0 left-0 z-50 w-full min-h-screen md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-gray-100 shadow-md ">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal()" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form action="/meeting/save" method="POST" id="reserva-consultation"
                    class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8">
                    @csrf
                    <h3 class="text-xl font-medium text-gray-900 ">Confirma tu consulta</h3>
                    <div>
                        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Descripcion
                        </label>
                        <textarea onkeyup="updateCounter()" minlength="5" type="text" name="comment" id="comment" {{-- maxlength="100" --}}
                            class="bg-gray-50 h-20 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="breve descripcion de la duda" required=""></textarea>
                        <div class="flex justify-between items-center">
                            <span id="comment-error" class="text-red-300 hidden p-1">Debe entre 5 a 100 caracteres!
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

                        <x-button class="!bg-gray-100 duration-200 hover:!bg-gray-300 !text-gray-700" type="button">
                            Cancelar
                        </x-button>

                        <x-button id="confirm" type="submit">
                            Confirma
                        </x-button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    @if ($consultations->count())
        <ul role="list" class="container m-auto divide-y my-4 p-4  divide-gray-300 ">
            @error('comment')
                <p class="p-2 text-red-500 my-4">{{ $message }}</p>
            @enderror
            @foreach ($consultations as $con)
                {{-- {{ dd($con) }} --}}
                {{-- <li>{{ $con->alternative }}</li> --}}
                <li
                    class="result-search-item p-3 sm:py-4 bg-white shadow hover:shadow-lg hover:rounded-sm cursor-pointer duration-300 hover:bg-blue-500 hover:!text-white ">
                    <div class="flex gap-2 sm:items-center sm:flex-row flex-col sm:space-x-4">


                        <div class="flex-shrink-0 flex items-center  gap-1">
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
                                <p class="text-sm text-gray-500 truncate ">
                                    {{ $con->email }}
                                </p>
                            </div>

                        </div>
                        {{-- <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $con->firstname }}
                            </p>
                            <p class="text-sm text-gray-500 truncate ">
                                {{ $con->email }}
                            </p>
                        </div> --}}
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium capitalize text-gray-900 truncate">
                                {{ $con->name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate ">
                                {{ $con->dayOfWeek }} |
                                {{ $con->time }}
                            </p>
                            <p class="text-sm text-gray-500 truncate ">
                                Salon :
                                {{ $con->place }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                            @if ($con->active)
                                <x-button type='button' onclick="dothat({{ $con->id }})">
                                    Reservar
                                </x-button>
                            @else
                                <x-button class="bg-red-500" type='button' disabled>
                                    Supendido
                                </x-button>
                            @endif
                        </div>
                    </div>
                    @if (!$con->active)
                        <div class="reason-cancel">
                            <span class="p-1 text-sm text-red-300"> Esta consulta está suspendida por el momento!
                            </span>
                        </div>
                    @endif
                    {{-- <form class="mt-4 hidden form-confirm" action="">
                        <div class="flex justify-between">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Descripcion
                            </label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="breve descripcion de la duda" required="">
                    <button type="submit"
                        class="w-full text-white flex-1  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center">
                        Confirma
                    </button>
                    </div>
                    </form> --}}

                </li>
            @endforeach
            <div class="my-4 p-2">
                {{ $consultations->links() }}
            </div>

        </ul>
    @else
        <div class="container flex w-full items-center justify-center p-6 m-4">
            <p class="bg-gray-200 border-l-4 border-red-500 p-4 w-4/5">No hay resultado para <strong>
                    {{ request('search') }}. </strong>
                Volver al <x-nav-link class="text-blue-500" href="/">Inicio</x-nav-link>
            </p>
        </div>
    @endif


</x-app-layout>
