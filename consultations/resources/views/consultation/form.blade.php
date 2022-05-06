
@if(isset($consultation))
<x-form_consultation
    :teachers="$teachers"
    :subjects="$subjects"
    :modo="$modo"
    :consultation="$consultation"
/>
@else
<x-form_consultation
    :teachers="$teachers"
    :subjects="$subjects"
    :modo="$modo"

/>
@endif
