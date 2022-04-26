<x-app-layout>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Mis Consultas
        </span>
    </x-slot>

<div class="consultation-update">
    <form action="{{url('/consultation/save')}}" method="post">
        @csrf
        @method('PATCH')

        @include('consultation.form',
        [
            'modo' => 'editar'

        ])
</div>
</x-app-layout>
