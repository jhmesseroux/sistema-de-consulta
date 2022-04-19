<div class="role-update">
    <form action="/admin/role/save" method="post">
        @csrf
        <input type="hidden" value="{{ $role->id }}" name="id" id="name">

        <fieldset>
            <label for="name">Nombre</label>
            <input type="text" value="{{ $role->name }}" name="name" id="name" placeholder="Ingrese un nombre">
            @error('name')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <fieldset>
            <label for="description">Descripcion</label>
            <input type="text" value="{{ $role->description }}" name="description" id="description"
                placeholder="Ingrese un description">
            @error('description')
                <p class="text-red-400 text-xs p-1">{{ $message }}</p>
            @enderror
        </fieldset>
        <button type="submit">Editar</button>
    </form>
</div>
