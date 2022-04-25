<x-app-layout>
    <x-slot name="header">
        <span class="font-bold text-gray-700">
            Mis Consultas
        </span>
    </x-slot>

    @foreach ($meeting as $meet)
        <li>{{ $meet->comment }}</li>
    @endforeach
</x-app-layout>
