
@props(['avatar','alt'])

@if (isset($avatar) && $avatar != "")
    <img class="rounded-full  shadow-sm border-2 border-gray-2"
        src="{{ asset('storage/' .$avatar) }}" alt="{{ $alt }}">
@else
    <svg class="h-6 w-6 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
        <path
            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
@endif
