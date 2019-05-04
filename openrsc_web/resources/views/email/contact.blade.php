@component('mail::message')
# New Contact Message

From: {{ $name }} ({{ $email }})

Subject: {{ $subject }}

@component('mail::panel')
	{{ $message }}
@endcomponent

@endcomponent
