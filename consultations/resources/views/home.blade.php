<x-app-layout>
    <x-slot name='header'></x-slot>
    <!-- Navigation ends -->
    <div class="flex flex-col mt-6 !h-full  items-center justify-center  mx-auto px-6">
        <div
            class="content__home lg:w-fit my-4 bg-white sm:flex-row  flex items-center flex-col justify-between  rounded shadow  m-auto">
            <div class="image">
                <img src="/image 2.png" width="250" alt="LOGO">
            </div>
            <div class="content__left-side p-6  w-100">
                <form method="GET" action="/search">
                    <div class="flex mb-3">
                        <label class="bg-red-500 hidden sm:flex p-2 px-3 text-white " for="search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </label>
                        <x-input style="border-radius: 0" class="!rounded-0 " type="search"
                            placeholder="Buscar por profesor o materia" class="sm:w-80 w-fit" name="search" id="search" required />
                    </div>
                    <div class="form-group mb-3 w-100">
                        <x-button class="!bg-blue-900 font-normal capitalize !text-base w-32 !text-center justify-center">Buscar</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
