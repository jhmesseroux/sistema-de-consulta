@props(['name'])
    @error($name)
        <p class="text-red-400 text-xs p-1">{{ $message }}</p>
    @enderror
