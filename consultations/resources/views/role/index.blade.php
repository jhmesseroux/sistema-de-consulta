<button class="">
    <a href="/role/create">
        Agregar
    </a>
</button>
@foreach ($roles as $role)
    <li>
        {{ $role->name }}
        <a href="/role/update/{{ $role->id }}">Editar</a>

    </li>
@endforeach
