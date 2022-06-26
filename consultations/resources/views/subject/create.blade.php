<x-admin>
    {{-- <x-slot name="header">
        <span class="font-bold text-gray-700">
            Crear materia
        </span>
    </x-slot> --}}
    <div class="w-full p-6 border-2  sm:w-4/6 m-auto bg-white shadow-md rounded">
        <form action="/admin/subject" method="post">
            @csrf
            <h3 class="form-title mb-0 gradient">Agregar Materia</h3>
            @include('subject.form')
        </form>
    </div>
</x-admin>
