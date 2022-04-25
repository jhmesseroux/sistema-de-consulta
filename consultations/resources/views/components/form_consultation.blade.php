
<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">

      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="#" method="POST">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="teacher_id" class="block text-sm font-medium text-gray-700">Profesor</label>
                  <input type="text" name="teacher_id" id="teacher_id"
                    autocomplete="techer_id" list="drawTeachers"
                    value="{{ isset($consultation->teacher_id)? $consultation->teacher_id : '' }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  @error('teacher_id')
                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                  @enderror
                  <datalist id="drawTeachers">
                    @foreach ( $teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->firstname.' '.$teacher->lastname}}</option>
                    @endforeach
                  </datalist>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="subject_id" class="block text-sm font-medium text-gray-700">Materia</label>
                  <input type="text" name="subject_id" id="subject_id"
                   value="{{ isset($consultation->subject_id)? $consultation->subject_id: '' }}"
                   autocomplete="subject_id"
                   list="drawSubject"
                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                   @error('subject_id')
                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                   @enderror
                   <datalist id="drawSubject">
                        @foreach ( $subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                   </datalist>

                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="type" class="block text-sm font-medium text-gray-700">Tipo de consulta</label>
                  <select id="type" name="type" autocomplete="type"
                  value="{{ isset($consultation->type)? $consultation->type : '' }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Presencial</option>
                    <option>Virtual</option>
                    <option>Hibrida</option>
                  </select>
                  @error('type')
                     <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="dayOfWeek" class="block text-sm font-medium text-gray-700">Día de la semana</label>
                  <input type="text"
                    name="dayOfWeek" id="dayOfWeek" list="dayOfWeekList"
                    value="{{ isset($consultation->dayOfWeek)? $consultation->dayOfWeek : '' }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

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
                  <input type="time" name="time" id="time"
                  value="{{ isset($consultation->subject_id)? $consultation->subject_id: '' }}"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2" id="div_place" >
                  <label for="place" class="block text-sm font-medium text-gray-700">Lugar</label>
                  <input type="text" name="place" id="place" autocomplete="place"
                  value="{{ isset($consultation->place)? $consultation->place : '' }}"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                    <input type="text" name="link" id="link"
                    value="{{ isset($consultation->link)? $consultation->link : '' }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">

                  <label for="active" class="block text-sm font-medium text-gray-700">Estado de la consulta</label>
                  <input type="text" name="active" id="active"
                  value="{{ isset($consultation->active)? 'Activo' : 'Inactivo' }}"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                  </div>
                  <div class="col-span-6 sm:col-span-3 lg:col-span-2 ">
                    <label for="darDeBajaButton" class="block text-sm font-medium text-gray-700">.</label>
                    <button type="submit" id="darDeBajaButton" class=" justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Dar de baja</button>

                </div>

                <div class="col-span-6">
                  <label for="reasonCancel" class="block text-sm font-medium text-gray-700">Razón cancelada</label>
                  <input type="textarea" name="reasonCancel" id="reasonCancel"
                  value="{{ isset($consultation->reasonCancel)? $consultation->reasonCancel : '' }}"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6">
                  <label for="alternative" class="block text-sm font-medium text-gray-700">Consulta alternativa</label>
                  <input type="textarea" name="alternative" id="alternative"
                  autocomplete="alternative-consultation"
                  value="{{ isset($consultation->alternative)? $consultation->alternative : '' }}"
                  placeholder="Ingresar dia, horario, lugar o link de la consulta alternativa" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                @if ($modo == 'crear')
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Editar</button>
                @else
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
                @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
