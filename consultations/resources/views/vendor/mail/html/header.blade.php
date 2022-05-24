<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://res.cloudinary.com/draxircbk/image/upload/v1653326573/sdc%20utn%202022/sdcutnwithnames_e2kyxc.png" class="logo" alt="SDC UTN 2022">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
