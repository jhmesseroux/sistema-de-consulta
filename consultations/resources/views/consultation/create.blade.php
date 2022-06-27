@if (Auth::user()->role->name =='Admin')
<x-admin>

    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Consultas
        </span>
    </x-slot>
    <br />

    <div class="consultation-create">
        <form action="{{url('/consultation')}}" method="post">
            @csrf
            @include('consultation.form',
            [
                'modo' => 'crear'

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
<div class="consultation-create">
    <form action="{{url('/consultation')}}" method="post">
        @csrf
        @include('consultation.form',
        [
            'modo' => 'crear'

        ])
</div>
</x-app-layout>
@endif
