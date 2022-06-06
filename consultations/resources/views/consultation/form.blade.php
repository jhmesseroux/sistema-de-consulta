
@if(isset($consultation))
<x-form_consultation
    :teachers="$teachers"
    :subjects="$subjects"
    :modo="$modo"
    :consultation="$consultation"
    :week="$week"
/>
@else
<x-form_consultation
    :teachers="$teachers"
    :subjects="$subjects"
    :modo="$modo"
    :week="$week"

/>
@endif
