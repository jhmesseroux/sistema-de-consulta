<div class="subject-create">
    <form action="/admin/subject/save" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" value="{{ $subject->id }}" name="id" id="id">

        <fieldset>
            <label for="name">Nombre</label>
            <input type="text" value="{{ $subject->name }}" name="name" id="name" placeholder="Ingrese un nombre">
            @error('name')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
        </fieldset>

        <button type="submit">Editar</button>
    </form>
</div>
