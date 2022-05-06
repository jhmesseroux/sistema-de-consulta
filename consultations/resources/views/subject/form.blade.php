<div class="subject-create">

        <input type="hidden" value="{{ isset($subject->id)? $subject->id: '' }}" name="id" id="id">

        <fieldset>
            <label for="name">Nombre</label>
            <input type="text" value="{{ isset($subject->name)? $subject->name : '' }}" name="name" id="name" placeholder="Ingrese un nombre">
            @error('name')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
        </fieldset>

        <button type="submit">Editar</button>

</div>
