@component('mail::message')
    # Bienvenido {{ $user->lastname }}

    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste minus laboriosam aut libero? Sed atque veniam quos cum.
    Eum, cumque.
    <ul>
        <li>one</li>
        <li>two</li>
        <li>Three</li>
    </ul>
    @component('mail::button', ['url' => '/'])
        Ver Perfil
    @endcomponent

    CEO,<br> Jean Hilaire Messeroux
@endcomponent
