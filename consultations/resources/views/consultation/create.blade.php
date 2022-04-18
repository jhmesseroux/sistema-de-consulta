<div class="consultation-create">
    <form action="/consultation" method="post">
        @csrf
        @include('consultation.form',
        [
            'modo' => 'crear'

        ])
</div>
