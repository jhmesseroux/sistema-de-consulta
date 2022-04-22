<x-app-layout>
    <x-slot name="header">
        Search
    </x-slot>
    <ul>
        @foreach ($consultations as $con)
            <li>{{ $con->alternative }}</li>
        @endforeach
    </ul>
</x-app-layout>
