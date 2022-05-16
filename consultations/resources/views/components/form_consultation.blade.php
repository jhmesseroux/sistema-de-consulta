<br />
<div class="flex justify-center  mt-10 sm:mt-0 ">

    <div class="md:grid md:grid-cols-3 place-content-center md:gap-6">

        <div class=" md:col-span-12" onload="mostrarSegunTipoDeConsulta()">

            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="px-4 py-5 bg-white sm:p-6">

                    <div class="grid grid-cols-6 gap-6">

                        @if ( isset(Auth::user()->role_id) && Auth::user()->role_id == "1")

                        <x-input type="hidden" value="{{ isset($consultation->id)? $consultation->id : '' }}" name="id"
                            id="id" />
                        <div class="col-span-6 sm:col-span-3" name="teacher_field">

                            <label for="teacher_id" class="block text-sm font-medium text-gray-700">Profesor</label>
                                <input type="text" name="teacher_id" id="teacher_id"
                                    value="{{ isset($consultation->teacher_id)? $consultation->teacher_id : '' }}"
                                    maxlength="510"
                                    autocomplete="techer_id" list="drawTeachers"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                
                                    <x-errorInput name='teacher_id' />

                                <datalist id="drawTeachers">
                                    @foreach ( $teachers as $teacher)

                                    <option value="{{$teacher->id}}" onclick="showTeacherAvatar({{$teacher->avatar}})">
                                        {{$teacher->firstname.' '.$teacher->lastname}}
                                    </option>
                                    @endforeach
                                </datalist>

                        </div>
                        @else
                        <input type="text" name="teacher_id" id="teacher_id"
                            value="{{ isset($consultation->teacher_id)? $consultation->teacher_id : '' }}"
                            autocomplete="techer_id" class="hidden">
                        @endif

                        <div class="col-span-6 sm:col-span-3">
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Materia</label>
                            <x-input type="text" name="subject_id" id="subject_id" list="drawSubject"
                                value="{{ isset($consultation->subject_id)? $consultation->subject_id : '' }}"
                                autocomplete="subject_id"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            <x-errorInput name='subject_id' />

                            <datalist id="drawSubject">
                                @foreach ( $subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipo de consulta</label>
                            <select id="type" onclick="mostrarSegunTipoDeConsulta()" name="type" autocomplete="type"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @if (isset($consultation->type ) && $consultation->type == 'Presencial')
                                <option selected>Presencial</option>
                                @else
                                <option>Presencial</option>
                                @endif

                                @if (isset($consultation->type ) && $consultation->type == 'Virtual')
                                <option selected>Virtual</option>
                                @else
                                <option>Virtual</option>
                                @endif

                                @if ( isset($consultation->type ) && $consultation->type == 'Hibrida')
                                <option selected>Hibrida</option>
                                @else
                                <option>Hibrida</option>
                                @endif

                            </select>
                            <x-errorInput name='type' />
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="dayOfWeek" class="block text-sm font-medium text-gray-700">Día de la
                                semana</label>
                            <x-input type="text"
                                value="{{ isset($consultation->dayOfWeek)? $consultation->dayOfWeek : '' }}"
                                name="dayOfWeek" id="dayOfWeek" list="dayOfWeekList" autocomplete="dayOfWeek"
                                maxlength="10"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            <x-errorInput name='dayOfWeek' />

                            <datalist id="dayOfWeekList">

                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sabado</option>
                                <option value="Domingo">Domingo</option>

                            </datalist>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="time" class="block text-sm font-medium text-gray-700">Horario</label>
                            <x-input type="time" value="{{ isset($consultation->time)? $consultation->time : '' }}"
                                name="time" id="time"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            <x-errorInput name='time' />
                        </div>


                        <div class="col-span-6 sm:col-span-3 lg:col-span-2" id="div_place" style="display:block">

                            <label for="place" class="block text-sm font-medium text-gray-700">
                                Lugar</label>
                            <x-input type="text" value="{{ isset($consultation->place)? $consultation->place : '' }}"
                                name="place" id="place" autocomplete="place-consultation"
                                maxlength="255"
                                onchange="dontAllowURL('place')"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            <x-errorInput name='place' />
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2" id="div_link" style="display: none">
                            <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                            <input type="text" value="{{ isset($consultation->link)? $consultation->link : '' }}"
                                name="link" id="link" autocomplete="link-consultation"
                                maxlength="255"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-errorInput name='link' />
                        </div>

                        @if ($modo == 'crear')


                        @else



                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">

                            <label for="active" class="block text-sm font-medium text-gray-700">Estado de la
                                consulta</label>
                            <x-input type="text" name="active" id="active"
                                value="{{ isset($consultation->active)? 'Activada' : 'Desactivida' }}"
                                maxlength="1"
                                autocomplete="" disabled />
                               
                            <x-errorInput name='active' />
                        </div>
                        <div class="col-span-6 sm:col-span-3 lg:col-span-2 ">
                            <label for=" " class="block text-sm font-medium text-gray-700">.</label>
                            @if ($consultation->active)
                            <x-button id="darDeBajaButton" class="bg-red-500" type="button"
                                onclick="darDeBajaConsulta()">
                                Dar de baja
                            </x-button>

                            @else

                            <x-button type="button" onclick="darDeBajaConsulta()">
                                Dar de alta
                            </x-button>

                            @endif


                        </div>

                        <div class="col-span-6 hidden" id="div_reasonCancel">
                            <label for="reasonCancel" class="block text-sm font-medium text-gray-700">Razón
                                cancelada</label>
                            <x-input type="textarea" name="reasonCancel" id="reasonCancel" autocomplete="reasonCancel"
                            maxlength="255"    
                            class="mt-1  w-full  " />
                               
                            <x-errorInput name='reasonCancel' />
                        </div>

                        <div class="col-span-6 hidden" id="div_alternative">
                            <label for="alternative" class="block text-sm font-medium text-gray-700">Consulta
                                alternativa</label>
                            <x-input
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                type="textarea" name="" id="alternative" autocomplete="alternative"
                                maxlength="255"
                                placeholder="Ingresar dia, horario, lugar o link de la consulta alternativa" />
                                
                            <x-errorInput name='alternative' />
                        </div>


                        @endif
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <a href="{{url('consultation')}}">
                        <x-button type="button" class="bg-red-500">Cancelar</x-button>

                    </a>
                    @if ($modo == 'crear')
                    <x-button type="submit" class="bg-green-500">Guardar</x-button>

                    @else
                    <x-button type="submit">Modificar</x-button>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/consultation.js') }}"></script>
<script src="{{ asset('js/validations.js') }}"></script>
