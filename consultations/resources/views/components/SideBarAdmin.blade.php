<div class="flex flex-no-wrap">
    <!-- Sidebar starts -->
    <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
    <div
        class="w-64 sticky top-0 max-h-screen min-h-screen sm:relative bg-blue-500 shadow md:h-full flex-col justify-between hidden sm:flex">
        {{-- Sidebar --}}
        <div>
            <div class="h-16 w-full flex items-center px-8">
                <x-application-logo />
            </div>
            <ul class="mt-12">
                <li
                    class="{{ request()->is('admin/dashboard') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-white  cursor-pointer items-center py-3 px-8">
                    <a href="/admin/dashboard"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                        </svg>
                        <span class="text-sm ml-2">Dashboard</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('admin/users') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/users"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                            </path>
                        </svg>
                        <span class="text-sm ml-2">Usuarios</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('admin/roles') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/roles"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                            <circle cx="12" cy="12" r="9"></circle>
                        </svg>
                        <span class="text-sm ml-2">Roles</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('admin/subjects') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/subjects"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="7 8 3 12 7 16"></polyline>
                            <polyline points="17 8 21 12 17 16"></polyline>
                            <line x1="14" y1="4" x2="10" y2="20"></line>
                        </svg>
                        <span class="text-sm ml-2">Materias</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('consultations') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/consultations"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                            <polyline points="4 12 12 16 20 12" />
                            <polyline points="4 16 12 20 20 16" />
                        </svg>
                        <span class="text-sm ml-2">Consultas</span>
                    </a>
                </li>

                <li
                    class=" {{ request()->is('admin/setting') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/setting"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        <span class="text-sm ml-2">Settings</span>
                    </a>
                </li>
            </ul>
            <div class="flex items-center mt-48 mb-4 px-8">
                <div class="w-10 h-10 bg-cover rounded-md mr-3">
                    @if (Auth::user()->avatar)
                        <img class="rounded-full  shadow-sm border-2 border-gray-2"
                            src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            alt="{{ Auth::user()->firstname }}">
                    @else
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    @endif
                </div>
                <div>
                    <p class="text-gray-200 text-sm font-medium">{{ Auth::user()->firstname }}</p>
                    <p class="text-gray-200 text-xs">
                        <a href="/users/{{ Auth::user()->dni }}">
                            Ver Perfil
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="px-8 sticky top-0  bg-blue-500">
            <ul class="w-full flex items-center justify-between">
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a aria-label="open notifications" href="/admin/dashboard">
                        <x-application-logo />

                    </a>
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a aria-label="open messages" href="javascript:void(0)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom_alternate_style-svg4.svg"
                            alt="chat">
                    </a>
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a aria-label="open settings" href="javascript:void(0)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom_alternate_style-svg5.svg"
                            alt="settings">
                    </a>
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3 ">
                    <a aria-label="open archive" href="javascript:void(0)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom_alternate_style-svg6.svg"
                            alt="drawer">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- Sidebar mobil open --}}
    <div class="w-64 z-40 fixed sm:relative bg-blue-500 shadow min-h-screen md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
        id="mobile-nav">
        <button aria-label="open sidebar" id="openSideBar"
            class="h-10 w-10 bg-blue-600 absolute right-0 mt-16 -mr-6 flex items-center shadow rounded-tr-full rounded-br-full justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-900"
            onclick="sidebarHandler(true)">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div id="closeSideBar"
            class="hidden h-10 w-10 bg-white text-red-700 absolute right-8 top-6  flex items-center shadow rounded-full hover:bg-gray-200  justify-center cursor-pointer text-white"
            onclick="sidebarHandler(false)">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="flex flex-col justify-between p-4  gap-4 min-h-screen">
            <div class="h-16 w-full flex items-center px-8">
                <x-application-logo />

            </div>
            <ul class="">



                <li
                    class="{{ request()->is('admin/dashboard') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-white  cursor-pointer items-center py-3 px-8">
                    <a href="/admin/dashboard"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                        </svg>
                        <span class="text-sm ml-2">Dashboard</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('admin/users') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/users"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                            </path>
                        </svg>
                        <span class="text-sm ml-2">Usuarios</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('admin/roles') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/roles"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                            <circle cx="12" cy="12" r="9"></circle>
                        </svg>
                        <span class="text-sm ml-2">Roles</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('admin/subjects') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/subjects"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="7 8 3 12 7 16"></polyline>
                            <polyline points="17 8 21 12 17 16"></polyline>
                            <line x1="14" y1="4" x2="10" y2="20"></line>
                        </svg>
                        <span class="text-sm ml-2">Materias</span>
                    </a>
                </li>
                <li
                    class=" {{ request()->is('consultations') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/consultations"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                            <polyline points="4 12 12 16 20 12" />
                            <polyline points="4 16 12 20 20 16" />
                        </svg>
                        <span class="text-sm ml-2">Consultas</span>
                    </a>
                </li>

                <li
                    class=" {{ request()->is('admin/setting') ? 'bg-indigo-800 ' : ' ' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center px-8 py-3">
                    <a href="/admin/setting"
                        class="flex items-center  rounded focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        <span class="text-sm ml-2">Settings</span>
                    </a>
                </li>


            </ul>
            {{-- perfil section --}}
            <div class="flex items-center px-8">
                <div class="w-10 h-10 bg-cover rounded-md mr-3">
                    @if (Auth::user()->avatar)
                        <img class="rounded-full  shadow-sm border-2 border-gray-2"
                            src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            alt="{{ Auth::user()->firstname }}">
                    @else
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    @endif
                </div>
                <div>
                    <p class="text-gray-200 text-sm font-medium">{{ Auth::user()->firstname }}</p>
                    <p class="text-gray-200 text-xs">
                        <a href="/users/{{ Auth::user()->dni }}">
                            Ver Perfil
                        </a>
                    </p>
                </div>
            </div>
        </div>
        {{-- <div class="px-8 bg-red-800">
            <ul class="w-full flex items-center justify-between">
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a aria-label="open notifications" href="javascript:void(0)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom_alternate_style-svg3.svg"
                            alt="notifications">
                    </a>
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a aria-label="open messages" href="javascript:void(0)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom_alternate_style-svg4.svg"
                            alt="chat">
                    </a>
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3">
                    <a aria-label="open settings" href="javascript:void(0)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom_alternate_style-svg5.svg"
                            alt="settings">
                    </a>
                </li>
                <li class="cursor-pointer text-white pt-5 pb-3 ">
                    <a aria-label="open archive" href="javascript:void(0)">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom_alternate_style-svg6.svg"
                            alt="drawer">
                    </a>
                </li>
            </ul>
        </div> --}}
    </div>
    <!--Mobile responsive sidebar-->
    <!-- Sidebar ends -->
    <!-- Remove class [ h-64 ] when adding a card block -->

</div>
{{-- <div class="relative rounded-full w-12 h-12">
                        @if (Auth::user()->avatar)
                            <img class="rounded-full  shadow-sm border-2 border-gray-2"
                                src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                alt="{{ Auth::user()->firstname }}">
                        @else
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1 ml-4">
                        <p class="font-medium leading-none">{{ Auth::user()->firstname }}</p>
                        <a href="#" class="no-underline text-xs text-gray-300 leading-none">Edit Profile</a>
                    </div> --}}
