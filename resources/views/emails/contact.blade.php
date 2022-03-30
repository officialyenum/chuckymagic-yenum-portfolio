
@component('mail::message')
# Hello Yenum,

{{ ucfirst($message->name) }} Just Sent You an Email

# Contact Email
{{ $message->email }}

# Project
{{ $message->project }}

# Message
{{ $message->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
