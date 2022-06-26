<x-app-layout>
    <x-slot name='header'></x-slot>

    <div class="container mx-auto w-9/12   my-6">

        <div class="lg:flex h-fit">
            <div
                class="xl:w-2/5 lg:w-2/5 !min-h-full via-blue-500 bg-blue-600 py-16 xl:rounded-bl rounded-tl rounded-tr xl:rounded-tr-none">
                <div class="xl:w-5/6 xl:px-0 px-8 mx-auto">
                    <h1 class="xl:text-4xl text-3xl pb-4 text-white font-bold">Contacto</h1>
                    <p class="text-xl text-white pb-8 leading-relaxed font-normal lg:pr-4">
                        ¿Tiene alguna duda? No dudes en contactarnos o escribirnos un mensaje.
                    </p>
                    <div class="flex pb-4 items-center">
                        <div aria-label="phone icon" role="img">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/contact_indigo-svg1.svg"
                                alt="phone" />

                        </div>
                        <p class="pl-4 text-white text-base">+54 9 341 101 1010</p>
                    </div>
                    <div class="flex items-center">
                        <div aria-label="email icon" role="img">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/contact_indigo-svg2.svg"
                                alt="email" />

                        </div>
                        <p class="pl-4 text-white text-base">sdcutn2022@gmail.com</p>
                    </div>
                    <p class="text-lg text-white pt-10 tracking-wide">
                        Zeballos 1247
                        <br />
                        Rosario , Santa Fe
                    </p>
                    {{-- <div class=" pt-16">
                        <a href="javascript:void(0)"
                            class="text-white font-bold tracking-wide underline focus:outline-none focus:ring-2 focus:ring-white ">View
                            Job Openings</a>
                    </div> --}}
                </div>
            </div>
            <div class="xl:w-3/5 lg:w-3/5 bg-gray-200 h-full xl:pl-0 rounded-tr rounded-br">
               
                <form id="contact" action="/admin/contact" method="POST"
                    class="bg-white  py-4 px-8 rounded-tr rounded-br">

                    @csrf

                     @if (Session::get('success'))
                    <div
                        class="text-green-600 p-4 border  my-4 rounded-sm shadow-sm bg-green-200">{{ Session::get('success') }}</div>
                @endif
                    {{-- <h1 class="text-4xl text-gray-800  font-extrabold mb-6">..</h1> --}}
                    <div class="block xl:flex flex-col w-full flex-wrap justify-between mb-6">
                        <div class="w-2/4 max-w-xs mb-6 xl:mb-0">
                            <div class="flex flex-col">
                                <label for="full_name"
                                    class="text-gray-800 text-sm font-semibold leading-tight tracking-normal mb-2">Nombre
                                    Completo</label>
                                <input required id="fullname" name="fullname" type="text"
                                    class=" focus:outline-none focus:border focus:border-indigo-700 font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="Nombre Completo" aria-label="Nombre completo por favor" />
                                @error('fullname')
                                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="flex w-full flex-wrap mb-6">
                        <div class="w-2/4 max-w-xs">
                            <div class="flex flex-col">
                                <label for="email"
                                    class="text-gray-800  text-sm font-semibold leading-tight tracking-normal mb-2">Mail</label>
                                <input required id="email" name="email" type="email"
                                    :value="Auth::user() ? Auth::user()->email : old('email')"
                                    class=" focus:outline-none focus:border focus:border-indigo-700 font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="example@gmail.com" aria-label="enter your phone number input" />
                                @error('email')
                                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full flex-wrap mb-6">
                        <div class="w-2/4 max-w-xs">
                            <div class="flex flex-col">
                                <label for="phone"
                                    class="text-gray-800  text-sm font-semibold leading-tight tracking-normal mb-2">Celular</label>
                                <input required id="phone" name="phone" type="tel"
                                    class=" focus:outline-none focus:border focus:border-indigo-700 font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                                    placeholder="+54 9 341 111 0990" aria-label="Ingrese su numero de telefono" />
                                @error('phone')
                                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-6">
                        <div class="flex flex-col">
                            <label class="text-sm font-semibold   mb-2" for="message">Message</label>
                            <textarea placeholder="" name="message"
                                class="border-gray-300 border mb-4 rounded py-2 text-sm outline-none resize-none px-3 focus:border focus:border-indigo-700"
                                rows="6" id="message" aria-label="enter your message input"></textarea>
                            @error('message')
                                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <x-button>
                            Enviar
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
