@extends('main')

@section('title', '- Rejestracja')

@section('content')
	
	<div class="row">
		<h1>Rejestracja</h1>
		<hr>
		
		{!! Form::open() !!}
			{{ Form::label('name', "Nazwa:") }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
			
			{{ Form::label('email', "Email:") }}
			{{ Form::text('email', null, ['class' => 'form-control']) }}
			
			{{ Form::label('password', "Hasło:") }}
			{{ Form::password('password', ['class' => 'form-control']) }}
			
			{{ Form::label('password_confirmation', "Potwierdź hasło:") }}
			{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			
			{{ Form::submit('Zarejestruj', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
		{!! Form::close() !!}
	</div>

	
@endsection