@extends('main')

@section('title', '- Rejestracja')

@section('content')
	
	<div class="row">
		<h1>Rejestracja</h1>
		<hr>
		
		{!! Form::open() !!}
			<div class="form-group">
				{{ Form::label('name', "Nazwa:") }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('email', "Email:") }}
				{{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('password', "Hasło:") }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('password_confirmation', "Potwierdź hasło:") }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			</div>
			
			{{ Form::submit('Zarejestruj', ['class' => 'btn btn-primary btn-block']) }}
		{!! Form::close() !!}
	</div>

	
@endsection