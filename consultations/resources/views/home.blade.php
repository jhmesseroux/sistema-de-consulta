<x-app-layout>
    <x-slot name='header'></x-slot>
    <!-- Navigation ends -->
    <div class="flex flex-col mt-6 !h-full  items-center justify-center  mx-auto px-6">
        <div
            class="content__home lg:w-fit my-4 bg-white sm:flex-row flex-1 flex items-center flex-col justify-between  rounded shadow  m-auto">
            <div style="    flex-basis: fit-content;" class="image">
                <img src="https://res.cloudinary.com/draxircbk/image/upload/v1655779122/sdc%20utn%202022/happy-young-curly-beautiful-woman-sitting-floor-with-crossed-legs-using-laptop-red-wall_buvznm.jpg"
                    alt="DSC-UTN 2022">
            </div>
            <div class="content__left-side p-6   w-full">
                <form method="GET" id="form-search" class="form-search" action="/search">
                    <div class="error-consultation hidden  text-sm text-red-500 bg-red-100 w-full p-3 mb-2">Campo
                        obligatorio</div>
                    <div class="flex mb-3">
                        <label class="bg-red-500 hidden sm:flex p-2 px-3 text-white " for="search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </label>
                        <x-input style="border-radius: 0" type="search" placeholder="Buscar por profesor o materia"
                            class="sm:w-80 !rounded-0 w-full " name="search" id="search-consultation" />
                    </div>
                    <div class="form-group mb-3 w-100">
                        <x-button
                            class="!bg-blue-500 w-32 rounded-none sm:rounded-full !text-center justify-center items-center font-semibold text-md">
                            Buscar
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
