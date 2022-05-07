<div class="subject-create">

        <input type="hidden" value="{{ isset($subject->id)? $subject->id: '' }}" name="id" id="id">

        <fieldset>
            <label for="name">Nombre</label>
            <input type="text" id="name" value="{{ isset($subject->name)? $subject->name : '' }}" name="name" id="name" placeholder="Ingrese un nombre">
            <x-errorInput name='name' />
        </fieldset>

        <button type="submit">Editar</button>

</div>
