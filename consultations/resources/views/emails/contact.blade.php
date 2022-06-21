@component('mail::message')
# Consultas de {{$fullname}}

{{$message}}

Contesta al <span class="text-blue-600">{{$email}}</span> 

Gracias,<br>
{{ config('app.name') }}
@endcomponent
