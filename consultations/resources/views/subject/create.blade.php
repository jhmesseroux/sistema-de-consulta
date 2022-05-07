<x-admin>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Crear materia
        </span>
    </x-slot>
    <form action="/admin/subject" method="post">
        @csrf
        @include('subject.form')
    </form>
</x-admin>
