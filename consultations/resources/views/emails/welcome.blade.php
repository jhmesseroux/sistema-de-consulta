@component('mail::message')
# Bienvenido {{ $user->lastname }}
Bienvenido a SDC UTN ,
estamos para ayudarte a lo largo del cursado . Puede visitar tu perfil con este boton 👇👇,
{{$link = 'hello'}}
@component('mail::button', ['url' => 'https://sdcutn2022.herokuapp.com/user/'.$user->dni])
 Visitar Perfil
@endcomponent
si no funciona usa este link <a href="https://sdcutn2022.herokuapp.com/"> https://sdcutn2022.herokuapp.com/user/{{$user->dni}}</a><br><br><br>
Gracias
@endcomponent
