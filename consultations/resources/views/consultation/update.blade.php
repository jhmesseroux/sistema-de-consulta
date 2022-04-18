<div class="consultation-update">
    <form action="/consultation/save" method="post">
        @csrf
        @method('PATCH')

        @include('consultation.form',
        [
            'modo' => 'editar'

        ])
</div>
