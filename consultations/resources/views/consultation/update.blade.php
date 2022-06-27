@if (Auth::user()->role->name =='Admin')
<x-admin>

    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Consultas
        </span>
    </x-slot>
    <br />

    <div class="consultation-update">
        <form action="{{url('/consultation/save')}}" method="post">
            @csrf
            @method('PATCH')

            @include('consultation.form',
            [
                'modo' => 'editar'

            ])
    </div>
</x-admin>
@else




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
@endif
