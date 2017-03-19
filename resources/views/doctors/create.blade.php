@extends('main')

@section('title', '- Dodaj lekarza')

@section('content')
	
	<div class="row">
		<h1>Dodawanie nowego lekarza</h1>
		<hr>
		
		{!! Form::open(['route' => 'doctors.store']) !!}
			{{ Form::label('academic_title', "Tytuł:") }}
			{{ Form::text('academic_title', null, ['class' => 'form-control']) }}
			
			{{ Form::label('first_name', "Imię:") }}
			{{ Form::text('first_name', null, ['class' => 'form-control']) }}
			
			{{ Form::label('last_name', "Nazwisko:") }}
			{{ Form::text('last_name', null, ['class' => 'form-control']) }}
			
			{{ Form::label('description', "Opis:") }}
			{{ Form::textarea('description', null, ['class' => 'form-control']) }}
			
			{{ Form::submit('Dodaj', ['class' => 'btn btn-success btn-lg btn-block']) }}
		{!! Form::close() !!}
	</div>

	
@endsection