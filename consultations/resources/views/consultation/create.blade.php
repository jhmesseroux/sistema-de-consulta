<div class="consultation-create">
    <form action="/consultation" method="post">
        @csrf
        <fieldset>
            <legend>Informacion requerida</legend>
            <div>
                <label for="name">Profesor</label>
                <input type="text" multiple name="name" id="name" list="drawTeachers" placeholder="Ingrese un nombre">

                <datalist id="drawTeachers">
                    @foreach ( $teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                </datalist>

                @error('name')
                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                @enderror

            </div>

            <div>
                <label for="subject_id">Materia</label>
                <input type="text" multiple name="subject_id" id="subject_id" list="drawSubject" placeholder="Ingrese la materia">

                <datalist id="drawSubjects">
                    @foreach ( $subjects as $subject)
                    <option value="1">Prueba</option>
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </datalist>

                @error('name')
                    <p class="text-red-400 text-xs p-1">{{ $message }}</p>
                @enderror
            </div>


        </fieldset>

        <fieldset>
            <label for="dayOfTheWeek">Dia de consulta</label>
            <input type="text" name="dayOfTheWeek" id="dayOfTheWeek" placeholder="Ingrese un description">
            @error('dayOfTheWeek')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror

            <div>
                <input type="radio" id="huey" name="drone" value="huey"
                       checked>
                <label for="huey">Presencial</label>
              </div>

              <div>
                <input type="radio" id="dewey" name="drone" value="dewey">
                <label for="dewey">Virtual</label>
              </div>




            <label for="place">Lugar de consulta</label>
            <input type="text" name="dayOfTheWeek" id="dayOfTheWeek" placeholder="Ingrese un description">
            @error('dayOfTheWeek')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror

        </fieldset>



        <button type="submit">Crear</button>
    </form>
</div>
