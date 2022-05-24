<x-admin>

    <div class="w-full max-w-screen-xl py-12 px-4">
        <div class="boxes flex gap-4 flex-wrap">
            <div class="box box-users space-y-4 rounded shadow-md bg-white p-6 w-64 ">
                <p class="form-title gradient mb-0">Usuarios</p>
                <div class="flex justify-between">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-2xl font-bold text-gray-800">{{$users->count()}}</span>
                </div>
                <x-nav-link
href="/admin/users"
                    class="flex items-center justify-center place-items-center cursor-pointer hover:text-blue-600 gap-2">
                    <span>
                        Ver todos...
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </x-nav-link>
            </div>
            <div class="box box-users space-y-4 rounded shadow-md bg-white p-6 w-64 ">
                <p class="form-title gradient mb-0">Consultas</p>
                <div class="flex justify-between">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-2xl font-bold text-gray-800">{{$consultations->count()}}</span>
                </div>
                <x-nav-link
                href="/consultations"
                    class="flex items-center justify-center place-items-center cursor-pointer hover:text-blue-600 gap-2">
                    <span>
                        Ver todos...
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </x-nav-link>
            </div>
            <div class="box box-users space-y-4 rounded shadow-md bg-white p-6 w-64 ">
                <p class="form-title gradient mb-0">Materias</p>
                <div class="flex justify-between">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-2xl font-bold text-gray-800">{{$subjects->count()}}</span>
                </div>
                <x-nav-link
                href="/admin/subjects"
                    class="flex items-center justify-center place-items-center cursor-pointer hover:text-blue-600 gap-2">
                    <span>
                        Ver todos...
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </x-nav-link>
            </div>

        </div>
    </div>

</x-admin>
