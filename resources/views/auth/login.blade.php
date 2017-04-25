@extends('main')

@section('title', '- Logowanie')

@section('content')
	
	<div class="row">
		<h1>Logowanie</h1>
		<hr>
		
		{!! Form::open() !!}		
			
			<div class="form-group">
				{{ Form::label('email', "Email:") }}
				{{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('password', "Hasło:") }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::checkbox('remember') }}{{ Form::label('remember', 'Zapamiętaj mnie') }}
			</div>

			{{ Form::submit('Zaloguj', ['class' => 'btn btn-primary btn-block']) }}

			<p><a href="{{ route('password.request') }}" class="btn btn-link">Zapomniałem hasła</a></p>	

		{!! Form::close() !!}
	</div>

	
@endsection