@component('mail::message')
# title > {{ $ticket->title }}<br>

{{ $user_mail->name }} a ticket assignet to you By {{ $user->name }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/ticket/'.$ticket->id])
show ticket
@endcomponent

Thanks, {{ $user_mail->name }}<br>
{{ config('app.name') }}
@endcomponent
