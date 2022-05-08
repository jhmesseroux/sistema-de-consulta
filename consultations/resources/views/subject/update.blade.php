<x-admin>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Editar Materia
        </span>
    </x-slot>
    <form action="/admin/subject/save" method="post">
        @csrf
        @method('PATCH')
        @include('subject.form')

    </form>

</x-admin>
