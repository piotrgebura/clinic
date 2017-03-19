@extends('main')

@section('title', '- Logowanie')

@section('content')
	
	<div class="row">
		<h1>Logowanie</h1>
		<hr>
		
		{!! Form::open() !!}		
			{{ Form::label('email', "Email:") }}
			{{ Form::text('email', null, ['class' => 'form-control']) }}
			
			{{ Form::label('password', "Hasło:") }}
			{{ Form::password('password', ['class' => 'form-control']) }}

			<br />
			{{ Form::checkbox('remember') }}{{ Form::label('remember', 'Zapamiętaj mnie') }}

			{{ Form::submit('Zaloguj', ['class' => 'btn btn-primary btn-block']) }}

			<p><a href="{{ route('password.request') }}" class="btn btn-link">Zapomniałem hasła</a></p>	

		{!! Form::close() !!}
	</div>

	
@endsection