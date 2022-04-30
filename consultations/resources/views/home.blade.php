<x-app-layout>
    <x-slot name='header'></x-slot>
    <!-- Navigation ends -->
    <div class="container flex flex-col items-center justify-center  mx-auto px-6"
        style="    min-height: calc(100vh - 20rem);">
        <div
            class="content__home lg:w-fit my-4 bg-white sm:flex-row  flex items-center flex-col justify-between  rounded shadow w-75 m-auto">
            <div class="image">
                <img src="/image 2.png" width="250" alt="LOGO">
            </div>
            <div class="content__left-side p-6  w-100">
                <form method="GET" action="/search">
                    <div class="flex mb-3">
                        <label class="bg-red-500 hidden sm:flex p-2 px-3 text-white " for="search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </label>
                        <x-input style="border-radius: 0" class="!rounded-0 " type="search"
                            placeholder="buscar por nombre o materia" name="search" id="search" />
                    </div>
                    <div class="form-group mb-3 w-100">
                        <x-button class="!bg-blue-500">Buscar</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-guest-footer />

</x-app-layout>
