<div class="consultation-create">
    <form action="/consultation" method="post">
        @csrf
        <fieldset>
            <legend>Informacion requerida</legend>
            <div>
                <label for="teacher_id">Profesor</label>
                <input type="text" multiple name="teacher_id" id="teacher_id" list="drawTeachers" placeholder="Ingrese un nombre">
                @error('teacher_id')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
                <datalist id="drawTeachers">
                    @foreach ( $teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->firstname.' '.$teacher->lastname}}</option>
                    @endforeach
                </datalist>



            </div>

            <div>
                <label for="subject_id">Materia</label>
                <input type="text" multiple name="subject_id" id="subject_id" list="drawSubject" placeholder="Ingrese la materia">
                @error('subject_id')
                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                 @enderror
                <datalist id="drawSubject">
                    @foreach ( $subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </datalist>


            </div>


        </fieldset>

        <fieldset>
            <label for="dayOfWeek">Dia de consulta</label>
            <input type="text" name="dayOfWeek" id="dayOfWeek" list="dayOfWeekList" placeholder="Ingrese un description">
            @error('dayOfWeek')
            <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
            <datalist id="dayOfWeekList">

                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miercoles">Miercoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sabado">Sabado</option>
                <option value="Domingo">Domingo</option>


            </datalist>



            <label for="time">Horario de consulta</label>
            <input type="time" name="time" id="time" placeholder="Ingrese hora de consulta">

            @error('time')
            <p class="text-red-400 text-xs p-1">{{ $message }}</p>
        @enderror

            <br/>
              <label for="type">Tipo de consulta</label>
                    <select name="type" id="type">
                        <option value="Presencial">Presencial</option>
                        <option  value="Virtual">Virtual</option>

                    </select>

                    @error('type')
                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                @enderror


              <label for="place">Lugar de consulta</label>
              <input type="text" name="place" id="place" placeholder="Ingrese lugar de consulta">
              @error('place')
                  <p class="text-red-400 text-xs p-1">{{ $message }}</p>
              @enderror

              <br/>
              <label for="link">Link de consulta</label>
              <input type="text" name="link" id="link" placeholder="Ingrese un link">


        </fieldset>



        <button type="submit">Crear</button>
    </form>
</div>
