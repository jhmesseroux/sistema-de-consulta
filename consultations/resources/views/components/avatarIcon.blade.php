
{{-- @props(['avatar','alt']) --}}

@if ($avatar)
<img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $avatar) }}"
    alt="{{ $altenative }}">
@else
<img class="rounded-full  shadow-sm border-2 border-gray-2 w-9 h-9"
    src="{{ asset('storage/avatars/default-avatar.png') }}"
    alt=" {{$alternative }}">
@endif
