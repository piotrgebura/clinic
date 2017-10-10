@extends('main')

@section('title', '- Zapomniałem hasła')

@section('content')
	
	<div class="row">
		<h1>Zresetuj hasło admina</h1>
		<hr>
		
		{!! Form::open(['route' => 'admin.password.request']) !!}		
			{{ Form::hidden('token', $token)}}

			{{ Form::label('email', "Email:") }}
			{{ Form::text('email', $email, ['class' => 'form-control']) }}

			{{ Form::label('password', "Nowe hasło:") }}
			{{ Form::password('password', ['class' => 'form-control']) }}
			
			{{ Form::label('password_confirmation', "Potwierdź nowe hasło:") }}
			{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			
			<br />
			{{ Form::submit('Zresetuj hasło', ['class' => 'btn btn-primary']) }}
		{!! Form::close() !!}
	</div>

	
@endsection