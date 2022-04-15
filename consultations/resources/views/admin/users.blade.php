<x-admin>

    <x-slot name="header" class="">
        Admin /users
    </x-slot>

    <div class="mx-auto container bg-white dark:bg-gray-800  shadow rounded">

        <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
            <table class="min-w-full bg-white dark:bg-gray-800">
                <thead>
                    <tr class="w-full h-16 border-gray-300 border-b py-8">
                        <th
                            class="pl-8 text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            <input placeholder="check box" type="checkbox"
                                class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400"
                                onclick="checkAll(this)" />
                        </th>

                        <th role="columnheader"
                            class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Avatar</th>
                        <th role="columnheader"
                            class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Legajo</th>
                        <th role="columnheader"
                            class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Nombre/Apellido</th>
                        {{-- <th role="columnheader"
                            class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Company Contact</th> --}}
                        <th role="columnheader"
                            class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Rol</th>
                        <th role="columnheader"
                            class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            Email</th>
                        <th
                            class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                            {{-- <div class="opacity-0 w-2 h-2 rounded-full bg-indigo-400"></div> --}}
                            Estado
                        </th>
                        <td role="columnheader"
                            class="text-gray-600 dark:text-gray-400 font-normal pr-8 text-left text-sm tracking-normal leading-4">
                            Accion</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="h-24 border-gray-300 border-b">
                            <td
                                class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                <input placeholder="check box" type="checkbox"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400"
                                    onclick="tableInteract(this)" />
                            </td>
                            <td>

                                @if ($user->avatar)
                                    <img class="rounded-full shadow-sm border-2 border-gray-2 w-9 h-9"
                                        src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->firstname }}">
                                @else
                                    <img class="rounded-full shadow-sm border-2 border-gray-2 w-9 h-9"
                                        src="{{ asset('storage/avatars/default-avatar.png') }}"
                                        alt="{{ $user->firstname }}">
                                @endif


                            </td>

                            <td
                                class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                {{ $user->legajo }}
                            </td>
                            <td
                                class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                {{ $user->lastname }}{{ $user->firstname }}</td>
                            {{-- <td class="pr-6 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_1.png"
                                            alt="Display Avatar of Carrie Anthony" role="img"
                                            class="h-full w-full rounded-full overflow-hidden shadow" />
                                    </div>
                                    <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">
                                        Carrie Anthony</p>
                                </div>
                            </td> --}}
                            <td
                                class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                {{ $user->role->name }}</td>
                            <td
                                class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                {{ $user->email }}
                            </td>
                            <td
                                class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                {{ $user->verified ? 'Si' : 'No' }}</td>

                            <td
                                class="text-sm flex gap-2 pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
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


                    <tr class="h-24 border-gray-300 border-b">
                        <td
                            class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                            <input placeholder="check box" type="checkbox"
                                class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400"
                                onclick="tableInteract(this)" />
                        </td>
                        <td
                            class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                            <div class="relative w-10">
                                <div
                                    class="absolute top-0 right-0 w-5 h-5 mr-2 -mt-1 rounded-full bg-indigo-700 text-white flex justify-center items-center text-xs">
                                    5</div>
                                <div class="text-gray-600 dark:text-gray-400">
                                    <img class="dark:hidden"
                                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8.svg"
                                        alt="icon-tabler-file">
                                    <img class="dark:block hidden"
                                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg8dark.svg"
                                        alt="icon-tabler-file">
                                </div>
                            </div>
                        </td>
                        <td
                            class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                            #MC10023</td>
                        <td
                            class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                            Toyota Motors</td>
                        <td class="pr-6 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_3.png"
                                        alt="Display Avatar of Carrie Anthony" role="img"
                                        class="h-full w-full rounded-full overflow-hidden shadow" />
                                </div>
                                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">
                                    Carrie Anthony</p>
                            </div>
                        </td>
                        <td
                            class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                            $2,500</td>
                        <td
                            class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                            02.03.20</td>
                        <td class="pr-6">
                            <div class="w-2 h-2 rounded-full bg-gray-600"></div>
                        </td>
                        <td class="pr-8 relative">
                            <button onclick="dropdownFunction(this)" aria-label="dropdown" role="button"
                                class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/compact_table_with_actions_and_select-svg9.svg"
                                    alt="dropdown">
                            </button>
                            <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                                <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                                    <li
                                        class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">
                                        Edit</li>
                                    <li
                                        class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">
                                        Delete</li>
                                    <li
                                        class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">
                                        Duplicate</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



</x-admin>
