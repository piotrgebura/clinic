@component('mail::message')
# Witaj {{ $user->name }}

Teraz posiadasz własne konto w naszym serwisie.

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent
