<div class="role-remove">
  <p><b>¿Seguro que deseas borrar el rol que posee los siguientes datos?</b></p>
  <form action="/admin/role/delete" method="post">
    @csrf
    <fieldset>
      <input type="hidden" value="{{ $role->id }}" name="id" id="id">
      <label for="name">Nombre</label>
      <input type="text" value="{{ $role->name }}" name="nombre" id="name" disabled>
      <label for="description">Descripcion</label>
      <input type="text" value="{{ $role->description }}" name="descripcion" id="description" disabled>
    </fieldset>
    <button type="submit">Sí, borrar</button>
  </form>
  <a href="/admin/roles">No, volver</a>
</div>
