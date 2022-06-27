<div aria-label="Menú de admin" class="flex flex-no-wrap fixed">
    {{-- Menú de escritorio --}}
    <div
        class="w-64 sticky top-0 max-h-screen overflow-auto min-h-screen sm:relative bg-blue-600 shadow flex-col justify-between hidden sm:flex">
        <div class="flex !h-full flex-col justify-around">
            <div class=" w-full flex items-center justify-center ">
                <img src="https://res.cloudinary.com/draxircbk/image/upload/v1653327438/sdc%20utn%202022/Eco_Home_Real_Estate_Logo_nnwggi.png"
                    alt="Sistema de Consulta UTN" width="150">
            </div>
            <ul class="mt-12">
                <li
                    class="{{ request()->is('admin/dashboard') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a href="/admin/dashboard" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                        </svg>
                        <span class="text-sm ml-2">Tablero</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/user') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a href="/admin/user" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 -ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="text-sm ml-2">Usuarios</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/role') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a href="/admin/role" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                            <circle cx="12" cy="12" r="9"></circle>
                        </svg>
                        <span class="text-sm ml-2">Roles</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/subject') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a href="/admin/subject" class="flex items-center rounded w-full h-full px-8 py-3">
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
                    class="{{ request()->is('consultation')  ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a href="/consultation" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                            <polyline points="4 12 12 16 20 12" />
                            <polyline points="4 16 12 20 20 16" />
                        </svg>
                        <span class="text-sm ml-2">Consultas</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/reasonCancel') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a href="/admin/reasonCancel" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" fill="none" width="18" height="18" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <span class="text-sm ml-2">Consultas canceladas</span>
                    </a>
                </li>


            </ul>
            <div class="flex items-center  px-8">
                <div role="img" aria-label="Foto de perfil" class="w-10 h-10 bg-cover rounded-md mr-3">
                    @if (Auth::user()->avatar)
                        <img class="rounded-full  shadow-sm border-2 border-gray-2"
                            title="{{ Auth::user()->firstname }}"
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
                    <a class="text-gray-200 text-xs" href="/user/{{ Auth::user()->dni }}">
                        Ver Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Menú responsivo --}}
    <div class="w-64 fixed sm:relative z-50 bg-blue-600 shadow min-h-screen md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
        id="sidebar" style="transform: translateX(-260px)">
        <button id="sidebar-toggle" title="Abrir menú"
            aria-expanded="false"
            aria-label="Abrir menú"
            aria-controls="sidebar-content"
            class="h-10 w-10 absolute flex items-center shadow justify-center cursor-pointer bg-blue-600 text-white right-0 mt-16 -mr-6 rounded-tr-full rounded-br-full"
            onclick="sidebarToggle()">
            <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div id="sidebar-content" aria-hidden="true" class="flex flex-col justify-between p-4  gap-4 min-h-screen">
            <div aria-hidden="true" class="w-full flex items-center justify-center">
                <img src="https://res.cloudinary.com/draxircbk/image/upload/v1653327438/sdc%20utn%202022/Eco_Home_Real_Estate_Logo_nnwggi.png"
                    alt="Sistema de Consulta UTN" width="120">
            </div>
            <ul>
                <li
                    class="{{ request()->is('admin/dashboard') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a tabindex="-1" href="/admin/dashboard" class="flex items-center rounded w-full h-full py-3 px-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                        </svg>
                        <span class="text-sm ml-2">Tablero</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/user') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a tabindex="-1" href="/admin/user" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 -ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="text-sm ml-2">Usuarios</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/role') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a tabindex="-1" href="/admin/role" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                            <circle cx="12" cy="12" r="9"></circle>
                        </svg>
                        <span class="text-sm ml-2">Roles</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('admin/subject') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a tabindex="-1" href="/admin/subject" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="7 8 3 12 7 16"></polyline>
                            <polyline points="17 8 21 12 17 16"></polyline>
                            <line x1="14" y1="4" x2="10" y2="20"></line>
                        </svg>
                        <span class="text-sm ml-2">Materias</span>
                    </a>
                </li>
                <li
                    class="{{ request()->is('consultation') ? 'bg-indigo-800 ' : '' }} flex w-full justify-between text-gray-200 hover:text-white hover:bg-indigo-800 cursor-pointer items-center">
                    <a tabindex="-1" href="/consultation" class="flex items-center rounded w-full h-full px-8 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack"
                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                            <polyline points="4 12 12 16 20 12" />
                            <polyline points="4 16 12 20 20 16" />
                        </svg>
                        <span class="text-sm ml-2">Consultas</span>
                    </a>
                </li>

            </ul>

            <div class="flex items-center px-8">
                <div role="img" aria-label="Foto de perfil" class="w-10 h-10 bg-cover rounded-md mr-3">
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
                    <a tabindex="-1" class="text-gray-200 text-xs" href="/user/{{ Auth::user()->dni }}">
                        Ver Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>


</div>
