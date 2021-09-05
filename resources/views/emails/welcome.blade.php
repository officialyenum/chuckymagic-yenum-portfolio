@component('mail::message')
# Hello {{$user->lastname}}

Thank you for registering on Yenum.dev, Please verify your email using this link :

@component('mail::button', ['url' => route('api.verify', $user->verification_token)])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
