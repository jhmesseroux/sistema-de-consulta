@component('mail::message')
# En Hora buena {{ $meet->user->lastname }}
Tu consulta se reservo con exito para el dia {{$meet->consultation->dayOfWeek}}

Materia : {{$meet->consultation->subject->name}}

Hora : {{$meet->consultation->time}}

Salon : {{$meet->consultation->place}}

Profesor : {{$meet->consultation->teacher->lastname}} {{$meet->consultation->teacher->firstname}} |  {{$meet->consultation->teacher->email}}

@component('mail::button', ['url' => 'https://sdcutn2022.herokuapp.com/meeting/user'])
Ver mis consultas
@endcomponent

Gracias
@endcomponent
