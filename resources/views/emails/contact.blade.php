@component('mail::message')

<h3>Otrzymałeś nową wiadomość wysłaną przez formularz kontaktowy</h3>

<div>
	{{ $message }}
</div>

<p>Wysłane przez {{ $email }}</p>

@endcomponent
