<div class="role-create">
    <form action="/role" method="post">
        @csrf
        <fieldset>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="Ingrese un nombre">
            @error('name')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset>
            <label for="description">Descripcion</label>
            <input type="text" name="description" id="description" placeholder="Ingrese un description">
            @error('description')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <button type="submit">Crear</button>
    </form>
</div>
