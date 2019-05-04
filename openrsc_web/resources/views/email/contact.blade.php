@component('mail::message')
# New Open RSC Website Contact Form Submission

From: {{ $name }} ({{ $email }})

Subject: {{ $subject }}

@component('mail::panel')
	{{ $message }}
@endcomponent

@endcomponent
