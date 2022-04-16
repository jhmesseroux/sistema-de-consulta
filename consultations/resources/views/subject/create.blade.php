<div class="subject-create">
    <form action="/admin/subject" method="post">
        @csrf
        <fieldset>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="Ingrese nombre de la materia">
            @error('name')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
        </fieldset>

        <button type="submit">Crear</button>
    </form>
</div>
