@component('mail::message')
# Cancelacion de consulta
La consulta de {{$subject}} del dia {{$dateCon}} fue cancelada . 
Gracias,<br>
{{ config('app.name') }}
@endcomponent
