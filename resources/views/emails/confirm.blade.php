
@component('mail::message')
# Hello {{$user->lastname}}

Please Confirm your email using this link :

@component('mail::button', ['url' => route('api.verify', $user->verification_token) ])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
