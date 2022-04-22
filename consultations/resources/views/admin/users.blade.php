<x-admin>

    <x-slot name="header" class="">
        Admin /users
    </x-slot>

    <div class="mx-auto container bg-white  shadow rounded">

        <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
            <table class="min-w-full bg-white ">
                <thead class="p-4">
                    <tr class="w-full h-10 !p-3 border-gray-300 border-b ">


                        <th role="columnheader"
                            class="text-gray-600  p-4 font-normal text-left text-sm tracking-normal leading-4">
                            Avatar</th>
                        <th role="columnheader"
                            class="text-gray-600  p-4 font-normal  text-left text-sm tracking-normal leading-4">
                            Legajo</th>
                        <th role="columnheader"
                            class="text-gray-600  p-4 font-normal  text-left text-sm tracking-normal leading-4">
                            Nombre/Apellido</th>
                        {{-- <th role="columnheader"
                            class="text-gray-600  font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Company Contact</th> --}}
                        <th role="columnheader"
                            class="text-gray-600 p-4  font-normal  text-left text-sm tracking-normal leading-4">
                            Rol</th>
                        <th role="columnheader"
                            class="text-gray-600  p-4 font-normal  text-left text-sm tracking-normal leading-4">
                            Email</th>
                        <th class="text-gray-600 p-4  font-normal  text-left text-sm tracking-normal leading-4">
                            {{-- <div class="opacity-0 w-2 h-2 rounded-full bg-indigo-400"></div> --}}
                            Active
                        </th>
                        <td role="columnheader"
                            class="text-gray-600  font-normal pr-8 text-left text-sm tracking-normal leading-4">
                            Accion</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="h-24 border-gray-300 border-b">

                            <td class="p-4">

                                @if ($user->avatar)
                                    <img class="rounded-full shadow-sm border-2 border-gray-2 w-9 h-9"
                                        src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->firstname }}">
                                @else
                                    <img class="rounded-full shadow-sm border-2 border-gray-2 w-9 h-9"
                                        src="{{ asset('storage/avatars/default-avatar.png') }}"
                                        alt="{{ $user->firstname }}">
                                @endif


                            </td>

                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800  tracking-normal leading-4">
                                {{ $user->legajo }}
                            </td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800  tracking-normal leading-4">
                                {{ $user->lastname }}{{ $user->firstname }}</td>
                            {{-- <td class="pr-6 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_1.png"
                                            alt="Display Avatar of Carrie Anthony" role="img"
                                            class="h-full w-full rounded-full overflow-hidden shadow" />
                                    </div>
                                    <p class="ml-2 text-gray-800  tracking-normal leading-4 text-sm">
                                        Carrie Anthony</p>
                                </div>
                            </td> --}}
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800  tracking-normal leading-4">
                                {{ $user->role->name }}</td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800  tracking-normal leading-4">
                                {{ $user->email }}
                            </td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800  tracking-normal leading-4">
                                {!! $user->verified ? "<div class='flex gap-1 items-center justify-center'> <span> Si</span> <span class='w-2 h-2 rounded-full bg-green-600'></span></div>" : "<div class='flex gap-1 items-center justify-center'> <span> Si</span> <span class='w-2 h-2 rounded-full bg-red-600'></span></div>" !!}

                            <td
                                class="text-sm flex gap-2 pr-6 whitespace-no-wrap text-gray-800  tracking-normal leading-4">
                                <x-button><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg></x-button>
                                <x-button><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg></x-button>
                                @if (!$user->verified)
                                    <form class="inline" method="POST"
                                        action="/admin/{{ $user->id }}/verify">
                                        @csrf
                                        <x-button
                                            class="bg-green-500 hover:bg-green-700 focus:bg-green-400 active:bg-green-700 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                            </svg>
                                        </x-button>
                                    </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>



</x-admin>
